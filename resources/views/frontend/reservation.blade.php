@extends('layouts.home')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-warning px-3">Reservation</h6>
                <h1 class="mb-5">Hotel Booking</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <form action="">
                <div class="row">
                    <div class="col-md-6 my-3">
                        <label for="name" class="form-label"><b>Name</b></label>
                        <input type="name" name="name" id="name" class="form-control me-3"
                            placeholder="Please Type Your Name" required>
                    </div>
                    <div class="col-md-6 my-3">
                        <label for="email" class="form-label"><b>Email</b></label>
                        <input type="email" name="email" id="email" class="form-control me-3"
                            placeholder="Please Type example@gmail.com" required>
                    </div>
                    <div class="col-md-6 my-3">
                        <label for="adults" class="form-label">Adults</label>
                        <input type="number" name="adults" id="adults" class="form-control" required>
                    </div>
                    <div class="col-md-6 my-3">
                        <label for="children" class="form-label">Children</label>
                        <input type="number" name="children" id="children" class="form-control" required>
                    </div>
                    <div class="container room_add">
                        <div class="" id="row0">
                            <div class="row">
                                <div class="col-md-6 my-3">
                                    <label for="room" class="form-label"><b>Room Type</b></label>
                                    <select name="room" id="" class="form-select" required>
                                        <option value="0" selected disabled>Please Select Room Type</option>
                                        <option value="1">Single Room</option>
                                        <option value="2">Double Room</option>
                                        <option value="3">Luxury Room</option>
                                        <option value="4">Family Room</option>
                                    </select>
                                </div>
                                <div class="col-md-5 my-3">
                                    <label for="room" class="form-label"><b>Room Number</b></label>
                                    <select class="form-select select2" id="multiple-select-field-0" data-placeholder="Choose anything" multiple required>
                                        <option value="1">204</option>
                                        <option value="1">208</option>
                                        <option value="1" disabled>203 <span>Stock Out</span></option>
                                        <option value="1">204</option>
                                        <option value="1">102</option>
                                        <option value="1">108</option>
                                        <option value="1">111</option>
                                        <option value="1">07</option>

                                    </select>
                                </div>
                                <div class="col-md-1 my-5">
                                    <div class="d-flex">
                                        <a class="btn px-2 me-2 addRoom" id=""><i
                                                class="fa-solid text-primary fa-plus"></i></a>
                                        <a class="btn  px-0 removeRoom" id="row0"><i
                                                class="fa-solid text-danger fa-minus" id="0"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 my-3">
                        <label for="check_in" class="form-label">Check In Date && Time</label>
                        <input type="text" class="form-control" placeholder="DD/MM/YYYY"
                            id="flatpickr-range" required />
                    </div>
                    <div class="col-md-6 my-3">
                        <label for="check_out" class="form-label">Check Out Date && Time</label>
                        <input type="text" class="form-control" placeholder="DD/MM/YYYY"
                            id="flatpickr-2" required />
                    </div>
                    <div class="col-md-12 my-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                    </div>
                    <div class="col-md-12 text-center">
                        <button class="btn btn-lg btn-warning">Book</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        var btnCount = 0;

        function initializeSelect2(elementId){
            $(elementId).select2({
                theme: "bootstrap-5",
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
                closeOnSelect: false,
            })
        }

        initializeSelect2('#multiple-select-field-0');

        //add another Room
        $(document).on('click', '.addRoom', function() {
            ++btnCount;
            var content = `
                        <div class="" id="row${btnCount}">
                            <div class="row ">
                                <div class="col-md-6 my-3">
                                    <label for="room" class="form-label"><b>Room Type</b></label>
                                    <select name="room" id="" class="form-select">
                                        <option value="0" selected disabled>Please Select Room Type</option>
                                        <option value="1">Single Room</option>
                                        <option value="2">Double Room</option>
                                        <option value="3">Luxury Room</option>
                                        <option value="4">Family Room</option>
                                    </select>
                                </div>
                                <div class="col-md-5 my-3">
                                    <label for="room" class="form-label"><b>Room Number</b></label>
                                    <select class="form-select select2" id="multiple-select-field-${btnCount}" data-placeholder="Choose anything" multiple>
                                        <option value="1">204</option>
                                        <option value="1">208</option>
                                        <option value="1" disabled>203 <span>Stock Out</span></option>
                                        <option value="1">204</option>
                                        <option value="1">102</option>
                                        <option value="1">108</option>
                                        <option value="1">111</option>
                                        <option value="1">07</option>
                                    </select>
                                </div>
                                <div class="col-md-1 my-5">
                                    <div class="d-flex">
                                        <a class="btn px-2 me-2 addRoom" id=""><i
                                                class="fa-solid text-primary fa-plus"></i></a>
                                        <a class="btn  px-0 removeRoom" id="row${btnCount}"><i class="fa-solid  text-danger fa-minus"
                                               id="0" ></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>  `;
            $('.room_add').append(content);

            initializeSelect2(`#multiple-select-field-${btnCount}`);
        });

        $(document).on('click', '.removeRoom', function() {
            if (btnCount != 0) {
                var row = '#' + $(this).attr('id');
                $(row).remove();
                --btnCount;
            } else {
                alert("You can't delete Room Type!");
            }
        })
    </script>

    <script>
        $(() => {
            var flatpickrDate = document.querySelector('#flatpickr-range');

            if (flatpickrDate) {
                flatpickrDate.flatpickr({
                    monthSelectorType: 'static',
                    // mode: "range",
                    dateFormat: "d/m/Y h:i K",
                    minDate: "today",
                    enableTime: true,
                });
            }

        })
        $(() => {
            var flatpickrDate = document.querySelector('#flatpickr-2');

            if (flatpickrDate) {
                flatpickrDate.flatpickr({
                    monthSelectorType: 'static',
                    // mode: "range",
                    dateFormat: "d/m/Y h:i K",
                    minDate: "today",
                    enableTime: true,
                });
            }

        })

    </script>
@endsection
