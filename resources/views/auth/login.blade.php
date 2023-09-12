@extends('layouts.app')
@section('styles')
    <style>
        .container {
            width: 100% !important;
            padding-right: 0px !important;
            padding-left: 15px !important;
            margin-right: auto !important;
            margin-left: auto !important;
        }

        @media (min-width: 1000px) {
            .container {
                max-width: 100%;
            }
        }
    </style>
@endsection
@section('content')
    <div class="authentication-wrapper authentication-cover">
        <div class="authentication-inner row m-0 p-0">
            <!-- /Left Text -->
            <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center">
                <div class="flex-row text-center mx-auto">
                    <img src="{{ asset('luffy_haki.png') }}" alt="Auth Cover Bg color" width="520"
                        class="img-fluid authentication-cover-img" data-app-light-img="pages/login-light.png"
                        data-app-dark-img="pages/login-dark.png" />
                    <div class="mx-auto">
                        <h3>Laravel Frame</h3>
                        <p>
                            Perfectly suited for all level of developers which helps you to <br />
                            kick start your next big projects & Applications.
                        </p>
                    </div>
                </div>
            </div>
            <!-- /Left Text -->

            <!-- Login -->
            <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4 vh-100"
                style="background: #fff">
                <div class="w-px-400 mx-auto">
                    <!-- Logo -->
                    <div class="app-brand mb-4">
                        <a href="" class="app-brand-link gap-2 mb-2" style="text-decoration: none">
                            <span class="app-brand-logo demo">
                                {{-- <img src="{{ asset('hmmlogo.png') }}" style="width: 26px;height:26px;" alt=""> --}}
                            </span>
                            <span class="app-brand-text demo h3 mb-0 fw-bolder text-dark">Laravel Frame</span>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-2">Welcome to Laravel Frame!</h4>
                    <p class="mb-4">Please sign-in to your account and start the adventure</p>

                    <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email </label>
                            <input type="text" class="form-control" name="email" id="email"
                                placeholder="Enter your email or username" autofocus />
                            @if ($errors->has('email'))
                                <div class="small text-danger">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password" id="password">Password</label>
                                {{-- <a href="auth-forgot-password-cover.html">
                                    <small>Forgot Password?</small>
                                </a> --}}
                            </div>
                            {{-- <div class="input-group input-group-merge"> --}}
                            <fieldset class="form-group position-relative">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;">
                                <div class="form-control-position">
                                    <i class="bx bx-show mb-1" id="pwd-show"></i>
                                </div>
                            </fieldset>
                            {{-- <input type="password" id="password" class="form-control" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" />
                                <span class="input-group-text cursor-pointer" id="pwd-show"><i
                                        class="bx bx-hide"></i></span> --}}
                            @if ($errors->has('password'))
                                <div class="small text-danger">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                            {{-- </div> --}}
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" name="remember" type="checkbox" id="remember-me" />
                                <label class="form-check-label" for="remember-me"> Remember Me </label>
                            </div>
                        </div>
                        <button class="btn btn-primary d-grid w-100" id="sign-in">Sign in</button>
                    </form>
                </div>
            </div>
            <!-- /Login -->
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        let pwd_show = document.querySelector('#pwd-show');

        let pwd_field = document.querySelector('#password');

        pwd_show.addEventListener("click", () => {
            if (pwd_field.type == "password") {
                pwd_field.type = "text";
                pwd_show.classList.toggle('bx-show');
                pwd_show.classList.toggle('bx-hide');
            } else {
                pwd_field.type = "password";
                pwd_show.classList.toggle('bx-show');
                pwd_show.classList.toggle('bx-hide');
            }
        })

        if (localStorage.chkbx && localStorage.chkbx != '') {
            $('#remember-me').attr('checked', 'checked');
            $('#email').val(localStorage.email);
            $('#password').val(localStorage.password);
        } else {
            $('#remember-me').removeAttr('checked');
            $('#email').val('');
            $('#password').val('');
        }
        $('#sign-in').on('click', function() {
            if ($('#remember-me').is(':checked')) {
                // save username and password
                localStorage.email = $('#email').val();
                localStorage.password = $('#password').val();
                localStorage.chkbx = $('#remember-me').val();
            } else {
                localStorage.email = '';
                localStorage.password = '';
                localStorage.chkbx = '';
            }
        })
    </script>
@endsection
