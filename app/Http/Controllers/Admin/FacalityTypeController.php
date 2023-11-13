<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Gate;
use App\Models\FacalityType;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFacalityTypeRequest;
use App\Models\Facality;

class FacalityTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $facalityType;
    public function __construct(FacalityType $facality_type)
    {
        $this->facalityType = $facality_type;
    }

    public function index()
    {
        abort_if(Gate::denies('facality_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $facalityTypes = $this->facalityType->paginate(100);

        return view('admin.facalityType.index',compact('facalityTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('facality_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.facalityType.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFacalityTypeRequest $request)
    {
        $facalityType = $this->facalityType;
        $facalityType->facality_type =  $request->input('facality_type');
        $facalityType->save();
        
        return redirect()->route('admin.facality-type.index')->with('success', 'FacalityType created successfully');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return("Hello World");
        $facalityType = $this->facalityType;
        $facalityType->find($id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
