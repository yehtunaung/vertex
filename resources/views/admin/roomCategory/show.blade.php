@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.room_category.title_singular') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            {{-- <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div> --}}
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.room_category.fields.id') }}
                        </th>
                        <td>
                            {{ $room_category->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.room_category.fields.room_type') }}
                        </th>
                        <td>
                            {{ $room_category->room_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.room_category.fields.capacity') }}
                        </th>
                        <td>
                            {{ $room_category->capacity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.room_category.fields.room_img') }}
                        </th>
                        <td>
                            <img src="{{ asset('storage/rooms/'.$room_category->room_img) }}" alt="room image" class="img-thumbnail img-fluid" style="width: 50px;height:50px;">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.room_category.fields.cost') }}
                        </th>
                        <td>
                            {{ $room_category->cost }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.room_category.fields.description') }}
                        </th>
                        <td>
                            {{ $room_category->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.roomCategory.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

{{-- <div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#service_person_service_assigns" role="tab" data-toggle="tab">
                {{ trans('cruds.serviceAssign.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="service_person_service_assigns">
            @includeIf('admin.users.relationships.servicePersonServiceAssigns', ['serviceAssigns' => $user->servicePersonServiceAssigns])
        </div>
    </div>
</div> --}}

@endsection
