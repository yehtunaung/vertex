@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="custom-header">
            Facality  List
            @can('role_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn button btn-success" href="{{ route('admin.facality.create') }}" >
                            Add Facality
                        </a>
                    </div>
                </div>
            @endcan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-AuditLog">
                    <thead>
                        <tr>
                            <th>
                                No
                            </th>
                            <th>
                                Facality Type Name
                            </th>
                            <th>
                                Facality Name
                            </th>
                            <th>
                               Icon
                            </th>
                             <th>
                                Action
                             </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($facalities as $key => $facality)
                            <tr data-entry-id="{{ $facality->id }}">
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>

                                    {{ $facality->facalityType->facality_type ?? '' }}
                                </td>
                                <td>
                                    {{ $facality->facality_name ?? '' }}
                                </td>
                                <td>
                                    {{ $facality->icon ?? '' }}
                                </td>
                                <td>
                                    @can('facality_show')
                                        <a class="p-0 glow"
                                            style="width: 26px;height: 36px;display: inline-block;line-height: 36px;color:grey;"
                                            title="view" >
                                            <i class='bx bx-show text-primary'></i>
                                        </a>
                                    @endcan

                                    @can('facality_type_edit')
                                        <a class="p-0 glow edit" data-bs-toggle="modal" data-bs-target="#exampleModal1" id="edit"
                                        data-id="{{ $facality->id }}" data-facality-type="{{ $facality->facality_type }}">
                                            <i class='bx bx-edit text-success'></i>
                                        </a>
                                    @endcan
                                    @can('user_delete')
                                            <form id="orderDelete-{{ $facality->id }}"
                                                action="{{ route('admin.facality-type.destroy', $facality->id) }}" method="POST"  style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button
                                                    style="width: 26px;height: 36px;display: inline-block;line-height: 36px;border:none;color:grey;background:none;"
                                                    class=" p-0 glow" title="delete"
                                                    onclick="return confirm('Are you sure?')">
                                                    <i class="bx bx-trash text-danger"></i>
                                                </button>
                                            </form>
                                        @endcan
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-3" style="float: right;">
                    {{-- {{ $facalityType->links() }} --}}
                </div>
            </div>
        </div>
    </div>

@endsection
