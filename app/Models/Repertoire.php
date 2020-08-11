<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Contact;
class Repertoire extends Model
{
    protected $table = 'repertoire';

    public function getContacts()
    {
        return Contact::where('repertoireReff', $this->Repert_id)->orderby('created_at', 'desc')->get();
    }

    public function isExist()
    {
        if(Repertoire::where('customerReff', session('customer')->customerID)->where('Repert_name', $this->Repert_name)->count()>0)
            return true;
        return false;
    }



}
