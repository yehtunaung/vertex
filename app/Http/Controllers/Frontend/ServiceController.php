<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function facilities()
    {
        return view('frontend.facilities');
    }

    public function testimonial()
    {
        return view('frontend.testimonial');
    }
    public function notfound()
    {
        return view('frontend.404');
    }
}
