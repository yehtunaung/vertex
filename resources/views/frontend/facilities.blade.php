@extends('layouts.home')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Facilities</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="{{'/'}}">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Facilities</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Facilities Start -->
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-warning px-3">Facalities</h6>
                {{-- <h1 class="mb-5">Our Facalities</h1> --}}
            </div>
            <section>
                <div class="row swimming">
                    <h4>Swimming & Soaking</h4>
                    <div class="col-lg-3">

                        <a href=""><i class="fa-solid fa-person-swimming"></i>&nbsp;&nbsp;<span>swimming pool (indoor)</span></a>
                    </div>
                    <div class="col-lg-3">
                       <a href=""><i class="fa-solid fa-water-ladder"></i>&nbsp;&nbsp;<span>swimming pool (outdoor)</span></a>
                    </div>
                    <div class="col-lg-3">
                      <a href=""><i class="fa-solid fa-hot-tub-person"></i>&nbsp;&nbsp;<span>Hot Spring Bath</span> </a>
                    </div>
                </div>
            </section>

            <section class="mt-5">
                <div class="row swimming">
                    <h4>Swimming & Soaking</h4>
                    <div class="col-lg-3">

                        <a href=""><i class="fa-solid fa-person-swimming"></i>&nbsp;&nbsp;<span>swimming pool (indoor)</span></a>
                    </div>
                    <div class="col-lg-3">
                       <a href=""><i class="fa-solid fa-water-ladder"></i>&nbsp;&nbsp;<span>swimming pool (outdoor)</span></a>
                    </div>
                    <div class="col-lg-3">
                      <a href=""><i class="fa-solid fa-hot-tub-person"></i>&nbsp;&nbsp;<span>Hot Spring Bath</span> </a>
                    </div>
                </div>
            </section>

            <section class="mt-5">
                <div class="row swimming">
                    <h4>Swimming & Soaking</h4>
                    <div class="col-lg-3">

                        <a href=""><i class="fa-solid fa-person-swimming"></i>&nbsp;&nbsp;<span>swimming pool (indoor)</span></a>
                    </div>
                    <div class="col-lg-3">
                       <a href=""><i class="fa-solid fa-water-ladder"></i>&nbsp;&nbsp;<span>swimming pool (outdoor)</span></a>
                    </div>
                    <div class="col-lg-3">
                      <a href=""><i class="fa-solid fa-hot-tub-person"></i>&nbsp;&nbsp;<span>Hot Spring Bath</span> </a>
                    </div>
                </div>
            </section>


        </div>
    <!-- Facilities End -->

@endsection
