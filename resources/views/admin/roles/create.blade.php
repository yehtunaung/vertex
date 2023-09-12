@extends('layouts.admin')
@section('styles')
    <style>
        .title_error,
        .permission_error {
            color: red;
            font-size: 13px;
            font-style: italic;
        }

        .required:after {
            content: " *";
            color: red;
        }
    </style>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.role.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.roles.store') }}" enctype="multipart/form-data" id="myForm">
                @csrf
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="required" for="title">{{ trans('cruds.role.fields.title') }}</label>
                            <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text"
                                name="title" id="title" value="{{ old('title', '') }}" required>
                            <span class="title_error"></span>
                            @if ($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.role.fields.title_helper') }}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="required" for="permissions">{{ trans('cruds.role.fields.permissions') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all"
                                    style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all"
                                    style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2 {{ $errors->has('permissions') ? 'is-invalid' : '' }}"
                                name="permissions[]" id="permissions" multiple required>
                                @foreach ($permissions as $id => $permission)
                                    <option value="{{ $id }}"
                                        {{ in_array($id, old('permissions', [])) ? 'selected' : '' }}>{{ $permission }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="permission_error"></span>
                            @if ($errors->has('permissions'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('permissions') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.role.fields.permissions_helper') }}</span>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 d-flex">
                        <div class="form-group mt-2">
                            <button class="btn btn-success" type="submit" id="save">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                        <div class="form-group mt-2 ms-2">
                            <a onclick=history.back() class="btn btn-secondary text-white">
                                {{ trans('global.cancel') }}
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('#save').on('click', function(e) {
            e.preventDefault();
            formValidation();
        })

        var formValidation = () => {
            let title = $('#title').val();
            let permission = $('#permissions').find(':selected').val();
            let arr = [];
            if (title == '') {
                $('.title_error').html('{{ trans('cruds.role.fields.title') }} {{ trans('global.must_be_filled') }}');
                arr.push('title');
            } else {
                $('.title_error').html('');
                if (arr.includes("title")) {
                    arr.splice(arr.indexOf('title'), 1);
                }
            }

            if (typeof permission === 'undefined') {
                $('.permission_error').html(
                    '{{ trans('cruds.role.fields.permissions') }} {{ trans('global.must_be_filled') }}'
                );
                arr.push('permission');
            } else {
                $('.permission_error').html('');
                if (arr.includes("permission")) {
                    arr.splice(arr.indexOf('permission'), 1);
                }
            }

            if (arr.length == 0) {
                document.getElementById("myForm").submit();
            }
        }
    </script>
@endsection
