@extends('layouts.admin')
@section('styles')
    <style>
        .name_error,
        .email_error,
        .password_error,
        .role_error {
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
            {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data" id="myForm">
                @csrf
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                                name="name" id="name" value="{{ old('name', '') }}" required>
                            <span class="name_error"></span>
                            @if ($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                            <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                                name="email" id="email" value="{{ old('email', '') }}" required>
                            <span class="email_error"></span>
                            @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                            <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                                name="password" id="password">
                            <span class="password_error"></span>
                            @if ($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
                        </div>
                    </div>
                    {{-- <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all"
                                    style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all"
                                    style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}"
                                name="roles[]" id="roles" multiple required>
                                @foreach ($roles as $id => $role)
                                    <option value="{{ $role->id }}"
                                        {{ in_array($id, old('roles', [])) ? 'selected' : '' }}>{{ $role->title }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="role_error"></span>
                            @if ($errors->has('roles'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('roles') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
                        </div>
                    </div> --}}

                    <div class="col-12">
                        <table class="table table-bordered table-sm mt-5">
                            @foreach ($roles as $role)
                                @if ($role->title == 'Admin' || $role->title == 'Adminstrator')

                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" name="{{ strtolower($role->title) }}" id="{{ $role->title }}" class="form-check-input">
                                                <label for="{{ $role->title }}" class="form-check-label"><span style="font-size: 0.9rem; font-weight:bold">{{ $role->title }}</span>
                                                </label>
                                            </div>
                                        </td>

                                        <td>
                                            <span style="background-color: #0c3176!important; font-size: 0.9rem"
                                                class="badge bg-secondary py-2 px-3 rounded-pill my-1 text-capitalize">{{ trans('cruds.user.fields.all_privilege') }}</span>
                                        </td>
                                    </tr>
                                @elseif($role->title == 'Engineer')
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" name="{{ strtolower($role->title) }}" id="{{ $role->title }}" class="form-check-input">
                                                <label for="{{ $role->title }}" class="form-check-label"><span style="font-size: 0.9rem; font-weight:bold">{{ $role->title }}</span>
                                                </label>
                                            </div>
                                        </td>

                                        <td>
                                            @foreach ($role->permissions as $permission)
                                                <span style="background-color: #0c3176!important; font-size: 0.9rem"
                                                    class="badge bg-secondary py-2 px-3 rounded-pill my-1 text-capitalize">{{ str_replace('_', ' ', $permission->title) }}</span>
                                            @endforeach
                                        </td>

                                    </tr>

                                @else
                                    <tr>
                                        <td class="text-nowrap">
                                            <div class="form-check">
                                                <input type="checkbox" name="" id="{{ $role->title }}" class="form-check-input">
                                                <label for="{{ $role->title }}" class="form-check-label"><span style="font-size: 0.9rem; font-weight:bold">{{ $role->title }}</span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            @foreach ($role->permissions as $permission)
                                                <span style="background-color: #0c3176!important; font-size: 0.9rem"
                                                    class="badge bg-secondary py-2 px-3 rounded-pill my-1 text-capitalize">{{ str_replace('_', ' ', $permission->title) }}</span>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
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
            let name = $('#name').val();
            let email = $('#email').val();
            let password = $('#password').val();
            let arr = [];
            if (name == '') {
                $('.name_error').html('{{ trans('cruds.user.fields.name') }} {{ trans('global.must_be_filled') }}');
                arr.push('name');
            } else {
                $('.name_error').html('');
                if (arr.includes("name")) {
                    arr.splice(arr.indexOf('name'), 1);
                }
            }

            if (email == '') {
                $('.email_error').html('{{ trans('cruds.user.fields.email') }} {{ trans('global.must_be_filled') }}');
                arr.push('email');
            } else {
                $('.email_error').html('');
                if (arr.includes("email")) {
                    arr.splice(arr.indexOf('email'), 1);
                }
            }

            if (password == '') {
                $('.password_error').html(
                    '{{ trans('cruds.user.fields.password') }} {{ trans('global.must_be_filled') }}');
                arr.push('password');
            } else {
                $('.password_error').html('');
                if (arr.includes("password")) {
                    arr.splice(arr.indexOf('password'), 1);
                }
            }

            if (arr.length == 0) {
                document.getElementById("myForm").submit();
            }
        }
    </script>
@endsection
