<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\HomeAbout;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        //$brands=\DB::table('brands')->get();
        //$sliders=\DB::table('sliders')->get();
        $brands=Brand::all();
        $sliders=Slider::all();
        $homeAbout=HomeAbout::all();

        return view('home',compact('brands','sliders','homeAbout'));
    }
}
