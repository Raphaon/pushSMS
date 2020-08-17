<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Customer;
use App\Models\Forfais;
use App\Models\Mail;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Message;
use App\Models\Repertoire;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    

    public function index()
    {
       if(!Session::has('customer') OR !session('customer')->isAuth)
       {
            return redirect('login');      
       }
     return view('Customer.index');
    }





    public function login()
    {

        return view('Customer.login');

    }


    public function new()
    {
        return view('Customer.new');
    }

    public function create(Request $request)
    {
       
        request()->validate([
            'name'=> ['required'],
            'email'=>  ['required', 'email'],
            'password'=> ['required', 'confirmed',  'min:8']
        ]);
        
         $custom = new Customer();
         $custom->customerID = sha1('PS'.request('email'));
         $custom->customerName =  request('name');
         $custom->customerSurname = request('surname');
         $custom->email = request('email');
         $custom->password = sha1(md5(request('password')));
         $custom->customerPhone = request('phone');
         $custom->active = 0;
         $custom->rememberTokenActivate = 0;
        if(!$custom->isExist()){
            if ($custom->save()) 
            {
                $subject = 'Activation Account';
                $msg = "Utilisez le lien ci-dessous pour activer votre compte pushSMS. afin de commencer à l utiliser \n" . route('activationMail', ['customerID' => $custom->customerID]) . " si le lien ne s'active pas automatiquement veuillez svp le copier et coller dans un navigateur \n Merci de votre confiance";
                $mail = new Mail();
                $mail->to = $custom->email;
                $mail->subject = $subject;
                $mail->content = $msg;

                $message = 'Merci  de nous avoir fait confiance en vous inscrivant.  Il ne vous reste plus qu\'une Etape. 
                       Rendez vous  à l\'adresse de messagerie '.
                             $mail->to.'. 
                        Nous vous avons envo    yé un mail pour activer votre compte.';

                if($mail->to !='' and $mail->subject !='' and $mail->content !='')
                {
                    if(!$mail->send())
                    {
                        $message = 'Nous navons pas pu vous envoyer un mail à ladresse '. $mail->to.' verifiez le mail fournis et reesayer';
                    }
                }
               
                
                session()->flash('mailToActivate', $message);
                return redirect('/activateMessage');
            }
            return 'Une Erreur est survenue lors de lenregistrement ';
        }
        else{
            return 'Cette adresse email est dea utilise' ;
        }
    }

    public function authentification(Request $request)
    {
        
        request()->validate([
            'email'=> ['required', 'email'],
            'password'=> ['required']
        ]);
        $pass = sha1(md5(request('password')));
        $email = request('email');
        $user = Customer::where('active', 1)->where('email', $email)->where('password', $pass)->first();
        //dd(sha1(md5('a')));
        if($user != '')
        {
            $user->isAuth = true;
            Session::put('customer', $user);
            //dd(session('customer'));
            return redirect('/dashboard');
        }
        $message = 'Login ou mot de passe incorrect !!!'; 
        
        $request->session()->flash('erreur', $message);
        return redirect('login');
    }

        public function  activateAccount(Request $request)
        {
            $custom = Customer::where('customerID', request('customerID'))->Update(['active'=> 1]);    
                return view('Customer.confirmationNotification');
        
        }

      public function recoveryPassword()
      {
          return view('Customer/passwordrecovery');
      }





    public function logout()
    {
      if(Session::has('customer')){
          Session::flush();
            Session::forget('isAuth');
        }  
        return redirect('login');
    }


    public function newForfais()
    {

    }

    public function activateMessage()
    {
        if(session()->has('mailToActivate'))
            return view('./Customer/mailActivation');
        return redirect('login');
    }
    public function recovery()
    {
        return view('Customer.passwordrecovery');
    }

    

    public function Update()
    {
        Customer::where('customerID', session('customer')->customerID)->Update([

        ]);
    }


    public function resetpassword(Request $request)
    {
        $token = request('token');
        return view('Customer.resetPassword');
    }



    public function changePassword(Request $request)
    {
        request()->validate([
            'password' =>  ['required', 'confirmed']
        ]);
    }


    public function MailRecovery(Request $request)
    {
        request()->validate([
            'email' =>  ['required', 'email']
        ]);
        $mail = new Mail();
        $mail->to = request('email');
        $mail->subject = 'PASSWORD RECOVERY';
        $link = route('resetpassword' ,['token'=> 'texttoken']);
        $mail->content = 'Vous avez Solliciter la reinitialisation de votre mot de passe  Si tel est le cas cliquez sur le lien ci '. $link. '> Si ce n est pas vous ignorez tout simplement ce message.';
        //dd($mail->content);
        return $mail->send();

    }
   





}