@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="custom-header">
            {{ trans("cruds.room.title") }}
            @can('room_create')
                <div style="margin-bottom: 10px;" class="row w-25">
                    <div class="col-lg-6">
                        <a class="btn button btn-danger" href="{{ route('admin.room.trash') }}" >
                            {{ trans("global.trash") }}
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a class="btn button btn-success" href="{{ route('admin.room.create') }}" >
                            {{ trans("cruds.room.room_add") }}
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
                                {{ trans('cruds.room.fields.no') }}
                            </th>
                            <th>
                                {{ trans('cruds.room_category.fields.room_type') }}
                            </th>
                            <th>
                                {{ trans('cruds.room_category.fields.room_img') }}
                            </th>
                            <th>
                                {{ trans('cruds.room.fields.room_no') }}
                            </th>
                             <th>
                                {{ trans('global.actions') }}
                             </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rooms as $key => $room)
                            <tr data-entry-id="{{ $room->id }}">
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    <img src="{{ asset('storage/rooms/'.$room->roomCategory->room_img) }}" alt="room image" class="img-thumbnail img-fluid" style="width: 50px;height:50px;">
                                </td>
                                <td>
                                    {{ $room->roomCategory->room_type }}
                                </td>
                                <td>
                                    {{ $room->room_no ?? '' }}
                                </td>
                                <td>
                                    @can('room_show')
                                        <a class="p-0 glow"
                                            href="{{ route("admin.room.show",$room->id) }}"
                                            style="width: 26px;height: 36px;display: inline-block;line-height: 36px;color:grey;"
                                            title="view" >
                                            <i class='bx bx-show text-primary'></i>
                                        </a>
                                    @endcan

                                    @can('room_edit')
                                        <a class="p-0 glow edit" href="{{ route("admin.room.edit",$room->id) }}" id="edit">
                                            <i class='bx bx-edit text-success'></i>
                                        </a>
                                    @endcan

                                    @can('room_delete')
                                            <form id="orderDelete-{{ $room->id }}"
                                                action="{{ route('admin.room.moveToTrash', $room->id) }}" method="POST"  style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button
                                                    style="width: 26px;height: 36px;display: inline-block;line-height: 36px;border:none;color:grey;background:none;"
                                                    class=" p-0 glow" title="delete"
                                                    onclick="return confirm('Are you sure to move trash?')">
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
