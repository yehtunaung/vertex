<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFacalityRequest;
use App\Http\Requests\UpdateFacalityRequest;
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
        abort_if(Gate::denies('facality_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
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
        abort_if(Gate::denies('facality_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
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
        abort_if(Gate::denies('facality_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $facalities = $this->facalities->find($id);
        $facalityType = $this->facalityType->get();
        return view('admin.facality.edit',compact('facalities','facalityType'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFacalityRequest $request, $id)
    {
        abort_if(Gate::denies('facality_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $facality = $this->facalities->find($id);
        $facality->update([
            'facality_type_id' => $request->facality_type_id,
            'facality_name' => $request->facality_name,
            'icon' => $request->icon
        ]);
        return redirect()->route('admin.facality.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('facality_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $facality = $this->facalities->find($id);
        $facality->delete();
        return redirect()->route('admin.facality.index');
    }
    public function trash()
    {
        $facalities = $this->facalities->onlyTrashed()->get();
        return view('admin.facality.trash',compact('facalities'));
    }
    public function restore($id)
    {
        $facalities = $this->facalities->withTrashed()->find($id)->restore();
        return redirect()->route('admin.facality.trash');
    }

    public function trashDelete($id)
    {
        $facility = $this->facalities->withTrashed()->find($id);

        if ($facility) {
            $facility->forceDelete();
                return redirect()->route('admin.facality.trash')->with("success");
        } else {
            return redirect()->route('admin.facality.trash')->with("Fail");
        }
    }
}
