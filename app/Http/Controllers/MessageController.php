<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Message;
class MessageController extends Controller
{
    public function index()
    {
        if (!Session::has('customer') or !session('customer')->isAuth) {
            return redirect('login');
        }
        $messages = Message::where('customerReff', session('customer')->customerID)->orderBy('created_at', 'desc')->paginate(100);
        return view('Message.Index' , compact('messages'));
    }

    public function new()
    {
        if (!Session::has('customer') or !session('customer')->isAuth) {
            return redirect('login');
        }
        return view('Message.new');
    }

    public function create(Request $request)
    {
        if (!Session::has('customer') or !session('customer')->isAuth) {
            return redirect('login');
        }
        request()->validate([
            'sender'=>['required','max:11'],
            'receiver'=> ['required', 'min:9'],
            'message'=> ['required', 'max:160']
        ]);
        $receivers = explode(',', request('receiver'));

        
            foreach ($receivers as $receiver) 
            {
                $sms = new Message();
                $sms->sender = request('sender');
                $sms->receiver = $receiver;
                $sms->statusMessage  = 'fail';
                $sms->content = request('message');
                $sms->customerReff = session('customer')->customerID;
                if(session('customer')->getAvailablleSMS()>=1){
                
                    $msg = 'Echec de l envoi veuillez reesayer ';
                    if($sms->send())
                    {
                        $sms->statusMessage  = 'send';
            
                        if ($sms->save()) {
                            $msg = 'Message envoye avec succes';
                        }else{
                            $msg ="Message envoyé avec succes Mais Echec de Sauvegarde du message";
                        }
                    }
                }else
                {
                    $msg  ='Votre forfais SMS est arrivé à epuisement, veuillez soucrire de nouveau';
                }
                
            }
        
        
         session()->flash('msg', $msg);
         return redirect('/newMessage');
    }


    public function __construct(Customer $customer)
    {
        
    } 

    
}
