<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Repertoire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class RepertoireController extends Controller
{

    public function  index()
    {
        if (!Session::has('customer') or !session('customer')->isAuth) {
            return redirect('login');
            
        }
        $repertoires = Repertoire::where('customerReff', session('customer')->customerID)->get();
        return view('Repertoire.index', compact('repertoires'));
    }


    public function new ()
    {
        if (!Session::has('customer') or !session('customer')->isAuth) {
            return redirect('login');
        }
        return view('Repertoire.new');
    }

    public function contact()
    {
        if (!Session::has('customer') or !session('customer')->isAuth) {
            return redirect('login');
        }
        return Contact::where('repertoireID', $this->codeRep)->get();
    }
}
