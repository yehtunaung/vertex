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
            <form method="POST" action="{{ route('admin.room.store') }}"  id="myForm" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="required" for="name">{{ trans("cruds.room_category.title_singular") }}</label>
                            <select class="form-select {{ $errors->has('room_category_id') ? 'is-invalid' : '' }}" aria-label="Default select example" name="room_category_id">
                                <option selected disabled>Open this select room category</option>
                                @foreach ($room_categories as $room_category)
                                    <option value="{{ $room_category->id }}">
                                        {{ $room_category->room_type }}
                                    </option>
                                @endforeach
                            </select>

                            <span class="room_category_id"></span>
                            @if ($errors->has('room_category_id'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('room_category_id') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 mb-3">
                        <div class="form-group">
                            <label class="required" for="room_img">{{ trans("cruds.room.fields.room_no") }}</label>
                            <input class="form-control {{ $errors->has('room_no') ? 'is-invalid' : '' }}"
                                type="text" name="room_no" id="room_no"
                                value="{{ old('room_no', '') }}">
                            <span class="room_img"></span>
                            @if ($errors->has('room_no'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('room_no') }}
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
        console.log(val);
        let check = checkNumber(val,0,1000000);

        if(!check){
            alert("cost must be positive");
            $("#cost").val("");
        }
    });
</script>
@endsection
