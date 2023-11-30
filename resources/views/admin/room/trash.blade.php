@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="custom-header">
            {{ trans("cruds.room.title") }}
            <span>{{ trans("global.restoreWarning") }}</span>
            @can('room_access')
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.room.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
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
                        @foreach ($roomTrashs as $key => $room)
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

                                    @can('room_edit')
                                        <form id="orderDelete-{{ $room->id }}"
                                            action="{{ route('admin.room.restore', $room->id) }}" method="POST"  style="display: inline-block;">
                                            <input type="hidden" name="_method" value="PUT">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button
                                                style="width: 26px;height: 36px;display: inline-block;line-height: 36px;border:none;color:grey;background:none;"
                                                class=" p-0 glow" title="restore"
                                                onclick="return confirm('Are you sure to restore?')">
                                                <i class="bx bx-rotate-right text-success"></i>
                                            </button>
                                        </form>
                                    @endcan

                                    @can('room_delete')
                                            <form id="orderDelete-{{ $room->id }}"
                                                action="{{ route('admin.room.destroy', $room->id) }}" method="POST"  style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button
                                                    style="width: 26px;height: 36px;display: inline-block;line-height: 36px;border:none;color:grey;background:none;"
                                                    class=" p-0 glow" title="delete"
                                                    onclick="return confirm('Are you sure to delete permanently?')">
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
