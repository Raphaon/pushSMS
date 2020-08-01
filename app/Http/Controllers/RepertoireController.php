<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class RepertoireController extends Controller
{
    public function contact()
    {
        return Contact::where('repertoireID', $this->codeRep)->get();
    }
}
