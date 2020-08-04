<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{

    public $to ;
    public $sender;
    public $subject;
    public $content;
    public $from;

    public function send()
    {
       if($this->to!='' and  $this->subject !='' and $this->content != '')
       {
           
            if( mail($this->to, $this->subject, $this->content))
            {
                return true;
            }
       }
       return false;       
    }


}
