<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Contact;
class Repertoire extends Model
{
    protected $table = 'repertoire';

    public function getContacts()
    {
        return Contact::where('repertoireReff', $this->Repert_id)->get();
    }

}
