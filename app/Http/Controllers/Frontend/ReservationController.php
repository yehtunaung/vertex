<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\StorePaymentRequest;
use App\Models\Booking;
use App\Models\Room;
use App\Models\Transcation;
use Carbon\Carbon;
use Stripe\Exception\CardException;
use Stripe\Stripe;
use Stripe\StripeClient;

class ReservationController extends Controller
{

    private $booking,$room,$transcation,$stripe;

    public function __construct(Booking $booking,Room $room,Transcation $transcation){
        $this->booking = $booking;
        $this->room = $room;
        $this->transcation = $transcation;
        $this->stripe = new StripeClient(env("STRIPE_SECRET"));
    }
    //
    public function index()
    {
        return view('frontend.reservation');
    }

    public function store(StoreBookingRequest $request){

        // search for avaliable room
        $maxCapacity = $this->room->withMax("roomCategory","capacity")
                        ->first()
                        ->toArray()
                        ['room_category_max_capacity'];

        $room = $this->room->with("roomCategory")
                ->whereRelation("roomCategory","room_type","=",$request->room)
                ->whereRelation("roomCategory",function($query) use ($request,$maxCapacity){
                    $query->where("capacity",">=",$request->adults+$request->children)
                    ->where("capacity","<=",$maxCapacity);
                })
                ->where("avaliable","=",0)
                ->get()
                ->toArray()[0];

        $booking_data = [
            "room" => $room,
            "client_data" => $request->except("_token")
        ];

        session()->put("booking_data",$booking_data);

        return redirect()->route("reservation.payment");
    }

    public function payment(){
        // if(!session()->get("booking_data")){
        //     return redirect()->route("reservation");
        // }
        $room_data = session()->get("booking_data")["room"];

        // return view("frontend.payment", ["room_data" => $room_data]);

        Stripe::setApiKey(env("STRIPE_SECRET"));

        $price = ceil(explode(" ",$room_data["room_category"]["cost"])[0]);

        // dd($price);

        $description = "Capacity: ".$room_data["room_category"]["capacity"].",Room No: ".$room_data["room_no"];

        $session = $this->stripe->checkout->sessions->create([
            "line_items" => [
                [
                    "price_data" => [
                        "currency" => "mmk",
                        "product_data" => [
                            "name" => $room_data["room_category"]["room_type"],
                            "description" => $description
                        ],
                        "unit_amount" => $price * 100,
                    ],
                    "quantity" => 1,
                ]
            ],
            "mode" => "payment",
            "success_url" => route("reservation.paySuccess"),
            "cancel_url" => route('reservation.payFail'),
        ]);

        return redirect()->away($session->url);
    }

    public function paySuccess(){

        $room_data = session()->get("booking_data")["room"];
        $client_data = session()->get("booking_data")["client_data"];

        $room_data["avaliable"] = 1;
        $this->room->update($room_data);

        // create booking

        // 12 hrs to 24 hrs format
        $checkInArray = explode(" ",$client_data["check_in_time"]);
        $checkInDate = join("-",array_reverse(explode("/",$checkInArray[0])));
        $checkInTime = date("H:i",strtotime($checkInArray[1]." ".$checkInArray[2]));
        $client_data["check_in_time"] = $checkInDate." ".$checkInTime;

        $checkOutArray = explode(" ",$client_data["check_out_time"]);
        $checkOutDate = join("-",array_reverse(explode("/",$checkInArray[0])));
        $checkOutTime = date("H:i",strtotime($checkOutArray[1]." ".$checkOutArray[2]));
        $client_data["check_out_time"] = $checkOutDate." ".$checkOutTime;

        $booking = [
            "booking_time" => Carbon::now(),
            ...$client_data
        ];
        $booking = $this->booking->create($booking);

        // create transcation
        $transcation_data = [
            "transcation_name" => time().$room_data["room_category"]["room_type"]."transcation",
            "booking_id" => $booking->id,
        ];

        $this->transcation->create($transcation_data);

        session()->remove("booking_data");

        return view("frontend.paySuccess");
    }

    public function payFail(){
        return view("frontend.payFail");
    }
}
