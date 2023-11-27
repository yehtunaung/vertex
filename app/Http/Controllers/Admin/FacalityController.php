<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFacalityRequest;
use Gate;
use App\Models\FacalityType;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\Facality;

class FacalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $facalities;
    private $facalityType;
    public function __construct(Facality $facality,FacalityType $facalityTye)
    {
        $this->facalities = $facality;
        $this->facalityType = $facalityTye;
    }
    public function index()
    {
        abort_if(Gate::denies('facality_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $facalities = $this->facalities->with('facalityType')->get();
        return view('admin.facality.index',compact('facalities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $facalityType = $this->facalityType->get();
        return view('admin.facality.create',compact('facalityType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFacalityRequest $request)
    {
        $facality = $request->all();
        $this->facalities->create($facality);
        return redirect()->route('admin.facality.index');
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
        //
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
