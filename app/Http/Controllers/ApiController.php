<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Message;
use App\Models\Project;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function sendGetMessage(Request $request){

       
        $apikey = request('apiKey');
        $to = request('to');
        $from = request('from'); 
        $content = request('message');
        $user =$this->getCustomerAndProject($apikey);
        if($this->getCustomerAndProject($apikey)!= null)
        {
            $sms = new Message();
            $sms->sender = $from;
            $sms->receiver = $to;                 
            $sms->statusMessage  = 'Fail';
            $sms->content = $content;
            $sms->customerReff = $user->customerID;           
        }   


        return request('message');
    }


    public function sendPostMessage(Request $request){
        return request() ;
    }

    public function getCustomerAndProject($apikey)
    {
        return Customer::join('project', 'project.customerReff', '=', 'customer.customerID')
        ->where('api_key', $apikey)->first();
    }

}
