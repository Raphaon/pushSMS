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
            $url_base = "http://obitsms.com/api/bulksms?username=" . env('PROVIDER_SMS_USERNAME') . "&password=" . env('PROVIDER_SMS_PASSWORD') . "&sender=" . urlencode($this->sender) . "&destination=237" . urlencode($this->receiver) . "&message=" . urlencode($this->content);
            $ch = curl_init($url_base);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            return $response = json_decode($response, true);
            curl_close($ch);
        }

        return 'Echec d envoi';
       
    }
}
