<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {



        return view('Home.Index');
    }

    public function sendUsMessage()
    {
    }
}
