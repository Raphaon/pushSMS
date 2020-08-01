<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Customer;
use App\Models\Forfais;
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
         $custom->isActivate = 0;
         $custom->rememberTokenActivate = 0;
        if($custom->isExist()){
            if ($custom->save()) {
                return 'inscription reussi !';
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
            return redirect('/');
        }
        $message = 'Login ou mot de passe incorrect !!!'; 
        
        $request->session()->flash('erreur', $message);
        return redirect('login');
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
    public function recovery()
    {
        return view('Customer.passwordrecovery');
    }

    

    public function Update()
    {
        Customer::where('customerID', session('customer')->customerID)->Update([

        ]);
    }

   





}