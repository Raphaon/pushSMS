<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RDVcontroller extends Controller
{
    public function create()
    {
        return view('RDV/New');
    }
}
