<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoomRequest;
use App\Models\Room;
use App\Models\RoomCategory;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Gate;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{

    private $roomCategory,$room;

    public function __construct(Room $room,RoomCategory $roomCategory){
        $this->room = $room;
        $this->roomCategory = $roomCategory;
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        //
        abort_if(Gate::denies("room_access"),Response::HTTP_FORBIDDEN,"403 Forbidden");
        $rooms = $this->room->with(["roomCategory"])->paginate(10);

        return view("admin.room.index",["rooms" => $rooms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        //
        abort_if(Gate::denies("room_create"),Response::HTTP_FORBIDDEN,"403 Forbidden");
        $roomCategories = $this->roomCategory->select("room_type","id")->get();

        return view("admin.room.create", ["room_categories" => $roomCategories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(StoreRoomRequest $request)
    {
        //
        abort_if(Gate::denies("room_create"),Response::HTTP_FORBIDDEN,"403 Forbidden");
        $this->room->create($request->all());

        return redirect()->route("admin.room.index");
    }

    /**
     * Display the specified resource.
     *
     */
    public function show($id)
    {
        //
        $room = $this->room->with(["roomCategory"])->find($id)->first();

        return view("admin.room.show",[ "room" => $room]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
    {
        //
        abort_if(Gate::denies("room_edit"),Response::HTTP_FORBIDDEN,"403 Forbidden");
        $room = $this->room->with("roomCategory")->find(1)->first();
        $room_categories = $this->roomCategory->select("room_type","id")->get();

        return view("admin.room.edit",[ "room" => $room,"room_categories" => $room_categories ]);

    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(StoreRoomRequest $request, $id)
    {
        //
        $data = $request->except(["_token","_method"]);

        $room = $this->room->where("id",$id)->first();

        $room->update($data);

        return redirect()->route("admin.room.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        //
        $this->room->where("id",$id)->forceDelete();

        return redirect()->route("admin.room.trash");
    }

    public function moveToTrash($id)
    {
        //
        $this->room->find($id)->delete();

        return redirect()->route("admin.room.index");
    }

    public function getTrashs(){

        $trashRooms = $this->room->onlyTrashed()->paginate(10);

        return view("admin.room.trash",[ "roomTrashs" => $trashRooms]);
    }

    public function restoreRoom($id){
        $trashRoom = $this->room->where("id",$id)->withTrashed()->first();

        $trashRoom->restore();

        return redirect()->route("admin.room.trash");
    }
}
