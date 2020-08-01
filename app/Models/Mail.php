<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{

    protected $to ;
    protected $sender;
    protected $subject;
    protected $mailContent;
    protected $from;

    public function send()
    {
        //mb_send_mail($this)
        return true ;
    }
}
