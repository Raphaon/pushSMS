<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'message';
     
    public function send()
    {
        if($this->sender != '' and $this->receiver !='' and $this->content )
        {
            if($this->getAvailablleSMS()>=1){
                $url_base = "http://obitsms.com/api/bulksms?username=" . env('PROVIDER_SMS_USERNAME') . "&password=" . env('PROVIDER_SMS_PASSWORD') . "&sender=" . urlencode($this->sender) . "&destination=237" . urlencode($this->receiver) . "&message=" . urlencode($this->content);
                $ch = curl_init($url_base);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                $response = json_decode($response, true);
                curl_close($ch);
                return true ;
            }
            
        }

        return false;
       
    }


    public function getAvailablleSMS()
    {
        return Forfais::where('customerReff', $this->customerID)->where('statusForfais', 'valide')->sum('remainingSMS');
    }

}
