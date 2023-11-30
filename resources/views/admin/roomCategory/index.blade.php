@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="custom-header">
            {{ trans("cruds.room_category.title") }}
            @can('role_create')
                <div style="margin-bottom: 10px;" class="row w-50">
                    <div class="col-lg-7">
                        <a class="btn button btn-danger float-end" href="{{ route('admin.roomCategory.trash') }}" >
                            {{ trans("global.trash") }}
                        </a>
                    </div>
                    <div class="col-lg-5">
                        <a class="btn button btn-success" href="{{ route('admin.roomCategory.create') }}" >
                            {{ trans("cruds.room_category.room_category_add") }}
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
                                {{ trans('cruds.room_category.fields.no') }}
                            </th>
                            <th>
                                {{ trans('cruds.room_category.fields.room_type') }}
                            </th>
                            <th>
                                {{ trans('cruds.room_category.fields.room_img') }}
                            </th>
                            <th>
                                {{ trans('cruds.room_category.fields.cost') }}
                            </th>
                             <th>
                                {{ trans('global.actions') }}
                             </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($room_categories as $key => $room_category)
                            <tr data-entry-id="{{ $room_category->id }}">
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>

                                    {{ $room_category->room_type }}
                                </td>
                                <td>
                                    <img src="{{ asset('storage/rooms/'.$room_category->room_img) }}" alt="room image" class="img-thumbnail img-fluid" style="width: 50px;height:50px;">
                                </td>
                                <td>
                                    {{ $room_category->cost ?? '' }}
                                </td>
                                <td>
                                    @can('room_category_show')
                                        <a class="p-0 glow"
                                            href="{{ route("admin.roomCategory.show",$room_category->id) }}"
                                            style="width: 26px;height: 36px;display: inline-block;line-height: 36px;color:grey;"
                                            title="view" >
                                            <i class='bx bx-show text-primary'></i>
                                        </a>
                                    @endcan

                                    @can('room_category_edit')
                                        <a class="p-0 glow edit" href="{{ route("admin.roomCategory.edit",$room_category->id) }}" id="edit">
                                            <i class='bx bx-edit text-success'></i>
                                        </a>
                                    @endcan
                                    @can('room_category_delete')
                                            <form id="orderDelete-{{ $room_category->id }}"
                                                action="{{ route('admin.roomCategory.moveToTrash', $room_category->id) }}" method="POST"  style="display: inline-block;">
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
