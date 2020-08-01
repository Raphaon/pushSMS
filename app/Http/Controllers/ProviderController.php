<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProviderController extends Controller
{
    protected $table = 'provider';
    public function getNbreMessageGlobal()
    {
        return 47;
    }
}
