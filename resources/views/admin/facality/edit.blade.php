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
            Edit Facality
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.facality.update',$facalities->id) }}"  id="myForm">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="required" for="name">Facality Type Name</label>
                            <select class="form-select" aria-label="Default select example" name="facality_type_id">
                                <option selected disabled>Open this select facalitytype</option>
                                @foreach ($facalityType as $value)
                                    <option value="{{ $value->id }}"  @if($value->id == $facalities->facality_type_id) selected @endif>{{ $value->facality_type }}</option>
                                @endforeach
                            </select>

                            <span class="facality_type_id_error"></span>
                            @if ($errors->has('facality_type_id'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('facality_type_id') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="required" for="facality_name">Facality Name</label>
                            <input class="form-control {{ $errors->has('facality_name') ? 'is-invalid' : '' }}"
                                type="text" name="facality_name" id="facality_name"
                                value="{{ $facalities->facality_name ?? '' }}" required >
                            <span class="facality_name_error"></span>
                            @if ($errors->has('facality_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('facality_name') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="" for="icon">Icon</label>
                            <input class="form-control" type="text" name="icon" id="icon" value="{{ $facalities->icon }}">
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 d-flex">
                        <div class="form-group mt-2">
                            <button class="btn btn-success" type="submit" id="save">
                                Update
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
