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
            {{ trans('global.create') }} Room Category
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.roomCategory.store') }}"  id="myForm" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="required" for="name">Room Type</label>
                            <select class="form-select {{ $errors->has('room_type') ? 'is-invalid' : '' }}" aria-label="Default select example" name="room_type">
                                <option selected disabled>Open this select facalitytype</option>
                                <option value="Single Room">
                                    Single Room
                                </option>
                                <option value="Double Room">
                                    Double Room
                                </option>
                                <option value="Luxury Room">
                                    Luxury Room
                                </option>
                                <option value="Family Room">
                                    Family Room
                                </option>
                            </select>

                            <span class="room_type"></span>
                            @if ($errors->has('room_type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('room_type') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 mb-3">
                        <div class="form-group">
                            <label class="required" for="room_img">{{ trans("cruds.room_category.fields.room_img") }}</label>
                            <input class="form-control {{ $errors->has('room_img') ? 'is-invalid' : '' }}"
                                type="file" name="room_img" id="room_img"
                                value="{{ old('room_img', '') }}">
                            <span class="room_img"></span>
                            @if ($errors->has('room_img'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('room_img') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 mb-3">
                        <div class="form-group">
                            <label class="" for="cost">{{ trans("cruds.room_category.fields.cost") }}</label>
                            <input class="form-control {{ $errors->has('cost') ? 'is-invalid' : '' }}"
                                type="text" name="cost" id="cost"
                                value="{{ old('cost', '') }}">
                            <span class="cost"></span>
                            @if ($errors->has('cost'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('cost') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 mb-3">
                        <div class="form-group">
                            <label class="" for="capacity">{{ trans("cruds.room_category.fields.capacity") }}</label>
                            <input class="form-control {{ $errors->has('capacity') ? 'is-invalid' : '' }}"
                                type="text" name="capacity" id="capacity"
                                value="{{ old('capacity', '') }}">
                            <span class="capacity"></span>
                            @if ($errors->has('capacity'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('capacity') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 mb-3">
                        <div class="form-group">
                            <label class="" for="description">{{ trans("cruds.room_category.fields.description") }}</label>
                            <textarea name="description" id="" cols="30" rows="10"
                            class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"></textarea>
                            <span class="description"></span>
                            @if ($errors->has('description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
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

    function checkNumber(num,start,end){
        if(num < start){
            return false;
        }

        if(num > end){
            return false;
        }

        return true;
    }

    // check negative value and limit
    $("#cost").keyup(() => {
        let val = Number($("#cost").val());
        let check = checkNumber(val,1,1000000);

        if(!check){
            alert("cost must be positive");
            $("#cost").val("");
        }
    });

    // check negative value and limit
    $("#capacity").keyup(() => {
        let val = Number($("#capacity").val());

        if(val){
            let check = checkNumber(val,1,20);
        }

        if(!check){
            alert("value must be positive or greater than 0 or less than 20");
            $("#capacity").val("");
        }
    });
</script>
@endsection
