<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Message;
class MessageController extends Controller
{
    public function index()
    {
        Message::where('customerID', session('customerID')->customerID)->paginate(100);
    }

    public function __construct(Customer $customer)
    {
        
    } 

    
}
