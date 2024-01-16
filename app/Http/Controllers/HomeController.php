<?php

namespace App\Http\Controllers;


use App\Models\Slider;
use App\Models\Destination;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Slider::latest()->get();
        $destinations = Destination::latest()->get();
        $testimonials = Testimonial::latest()->get();

        return view('frontend.home', compact('sliders', 'destinations','testimonials'));
    }
    public function home()
    {
        $sliders = Slider::latest()->get();
        $destinations = Destination::latest()->get();
        $testimonials = Testimonial::latest()->get();
        return view('frontend.home', compact('sliders', 'destinations','testimonials'));
    }

    public function about()
    {
        $sliders = Slider::latest()->get();
        $destinations = Destination::latest()->get();
        $testimonials = Testimonial::latest()->get();
        return view('frontend.about', compact('sliders', 'destinations','testimonials'));
    }

    public function destination()
    {
        $sliders = Slider::latest()->get();
        $destinations = Destination::latest()->get();
        $testimonials = Testimonial::latest()->get();
        return view('frontend.destination', compact('sliders', 'destinations','testimonials'));
    }

    public function contract()
    {
        $sliders = Slider::latest()->get();
        $destinations = Destination::latest()->get();
        $testimonials = Testimonial::latest()->get();
        return view('frontend.contract', compact('sliders', 'destinations','testimonials'));
    }
}
