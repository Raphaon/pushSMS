<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table ='contacts';
    protected $fillable = array('Contact_name', 'Contact_surname', 'Contact_email', 'Contact_adress', 'Contact_phone1', 'Contact_phone2', 'repertoireReff' );
}
