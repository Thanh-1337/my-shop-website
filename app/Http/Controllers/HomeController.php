<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index():View{
        return view('Home.index');
    }
    public function products():View{
        return view('Home.products');
    }
    public function about():View{
        return view('Home.about');
    }
    public function support():View{
        return view('Home.support');
    }
}
