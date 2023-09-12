<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>vERTEX</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->

    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- Fontawsome cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    {{-- Bootstra 5 Theme --}}
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

        <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>





    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('frestui/assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('frestui/assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('frestui/assets/vendor/fonts/flag-icons.css') }}" />


    <link rel="stylesheet" href="{{ asset('frestui/assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('frestui/assets/vendor/libs/quill/editor.css') }}" />
    <link rel="stylesheet" href="{{ asset('frestui/assets/vendor/css/pages/app-calendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('frestui/assets/vendor/libs/fullcalendar/fullcalendar.css') }}" />


</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-warning" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="{{ route('index')}}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-warning"><i class="fa fa-book me-3"></i>vERTEX</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ route('index') }}" class="nav-item nav-link {{ (request()->is('/')) ? 'active' : '' }}"> {{ trans('cruds.frontend.home') }} </a>
                <a href="{{ route('about') }}" class="nav-item nav-link {{ (request()->is('about')) ? 'active' : '' }}"> {{ trans('cruds.frontend.about') }} </a>
                <a href="{{ route('room') }}" class="nav-item nav-link {{ (request()->is('room')) ? 'active' : '' }}"> {{ trans('cruds.frontend.room') }} </a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle {{ (request()->is('facilities') || request()->is('testimonial') || request()->is('404')) ? 'active' : '' }}" data-bs-toggle="dropdown"> {{ trans('cruds.frontend.service') }} </a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="{{route('facilities')}}" class="dropdown-item">Facilities</a>
                        <a href="{{'testimonial'}}" class="dropdown-item">Testimonial</a>
                        <a href="{{'404'}}" class="dropdown-item">404 Page</a>
                    </div>
                </div>
                <a  class="nav-item nav-link {{ (request()->is('contact')) ? 'active' : '' }}" href="{{route('contact')}}"> {{ trans('cruds.frontend.contact') }} </a>
                <div class="nav-item dropdown">
                    <form action="">
                        <div class="dropdown fade-down m-0">
                            <select name="language" id="language-option" class="nav-link dropdown-toggle select">
                                <option value="en" @if (Session::get('locale') == 'en') selected @endif>
                                    English
                                </option>
                                <option value="mm" @if (Session::get('locale') == 'mm') selected @endif>
                                    Myanmar
                                </option>
                            </select>
                        </div>
                    </form>


                </div>
            </div>
            <a href="{{route('reservation')}}" class="btn btn-warning py-4 px-lg-5 d-none d-lg-block">Online Booking<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>

    <script>
        $(document).ready(function() {
            $('#language-option').change(function() {
                window.location.href = "/locale/" + $(this).val();
            });
        });
    </script>
    <!-- Navbar End -->
