<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Message;
use App\Models\Repertoire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CampagneController extends Controller
{
    public function create(){

        if (!Session::has('customer') or !session('customer')->isAuth) {
            return redirect('login');
        }

        $repertoires = Repertoire::where('customerReff', session('customer')->customerID)->get();
        return view('Campagne.new', compact('repertoires'));
    }

    public function store(Request $request)
    {
        if (!Session::has('customer') or !session('customer')->isAuth) {
            return redirect('login');
        }
       request()->validate([
           'sender'=> ['required'],
           'repertoire' =>  ['required'],
           'message'=> 'required'
       ]);
        $id = request('repertoire');
        $contacts = Repertoire::where('Repert_id', $id)->first()->getContacts();
        $message = request('message');
        $sender = request('sender');
        if($contacts->count()>0)
        {
            //dd($contacts);
            foreach ($contacts as $contact) {
                $msg = new Message();
                $msg->sender = $sender;
                $msg->receiver = $contact->Contact_phone1;
                $msg->content = $message;
                //$msg->send();
                $msg->statusMessage = 'send';
                $msg->customerReff = session('customer')->customerID;
                $msg->save();
                $request->session()->flash('status', 'Envois effectué avec success');
            }
        }else
        {
            $request->session()->flash('status', 'Votre repertoire n a aucun contact');
        }
        

        

        $repertoires = Repertoire::where('customerReff', session('customer')->customerID)->get();
        return view('Campagne/new', compact('repertoires'));
    }
}
