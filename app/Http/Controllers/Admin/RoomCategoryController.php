<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoomCategoryRequest;
use App\Http\Requests\UpdateRoomCategoryRequest;
use App\Models\RoomCategory;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Gate;
use Illuminate\Support\Facades\Storage;

class RoomCategoryController extends Controller
{

    private $roomCategory;

    public function __construct(RoomCategory $roomCategory){
        $this->roomCategory = $roomCategory;
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        //
        abort_if(Gate::denies("room_category_access"),Response::HTTP_FORBIDDEN,"403 Forbidden");
        $room_categories = $this->roomCategory->paginate(5);

        return view("admin.roomCategory.index",[ 'room_categories' => $room_categories ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        //
        return view('admin.roomCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(RoomCategoryRequest $request)
    {
        $filename = time()."-vertex-".$request->room_img->getClientOriginalName();
        $request->room_img->storeAs(
            'public/rooms', $filename
        );

        $data = [
            "room_img" => $filename,
            ...$request->except(["_token","room_img"])
        ];

        $this->roomCategory->create($data);

        return redirect()->route("admin.roomCategory.index");
    }

    /**
     * Display the specified resource.
     *
     */
    public function show($id)
    {
        //
        abort_if(Gate::denies("room_category_show"),Response::HTTP_FORBIDDEN,"403 Forbidden");
        $roomCategory = $this->roomCategory->where('id',$id)->first();

        return view("admin.roomCategory.show",[ "room_category" => $roomCategory ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
    {
        //
        abort_if(Gate::denies("room_category_edit"),Response::HTTP_FORBIDDEN,"403 Forbidden");
        $roomCategory = $this->roomCategory->where('id',$id)->first();

        return view("admin.roomCategory.edit",["room_category" => $roomCategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     *
     */
    public function update(UpdateRoomCategoryRequest $request, $id)
    {
        //
        $updateData = [];
        $roomCategory = $this->roomCategory->where("id",$id)->first();

        // handle new image update
        if($request->room_img){
            $oldFilename = $roomCategory->room_img;

            Storage::delete("public/rooms/".$oldFilename);

            $newFileName = time()."-vertex-".$request->room_img->getClientOriginalName();

            $request->room_img->storeAs(
                'public/rooms', $newFileName
            );

            $updateData = [
                "room_img" => $newFileName,
                ...$request->except(['_token','_method',"room_img"])
            ];
        }
        else{
            $updateData = $request->except(['_token','_method']);
        }


        $roomCategory->update($updateData);

        return redirect()->route("admin.roomCategory.index");

    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        //
        $roomCategory = $this->roomCategory->where("id",$id)->withTrashed()->first();

        if(Storage::exists("public/rooms/".$roomCategory->room_img)){
            Storage::delete("public/rooms/".$roomCategory->room_img);
        }

        $roomCategory->forceDelete();

        return redirect()->route("admin.roomCategory.trash");
    }

    public function moveToTrash($id){

        $this->roomCategory->where("id",$id)->delete();

        return redirect()->route("admin.roomCategory.index");
    }

    public function getTrashs(){

        $roomCateTrashs = $this->roomCategory->onlyTrashed()->paginate(10);

        return view("admin.roomCategory.trash",[ "roomCateTrashs" => $roomCateTrashs]);
    }

    public function restoreRoomCategory($id){

        $roomCate = $this->roomCategory->where("id",$id)->withTrashed()->first();

        $roomCate->restore();

        return redirect()->route("admin.roomCategory.trash");
    }
}
