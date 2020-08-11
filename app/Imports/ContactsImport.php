<?php

namespace App\Imports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\ToModel;

class ContactsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
       
        
        return new Contact([
            'Contact_name' => $row[1],
            'Contact_surname' => $row[2],
            'Contact_phone1' => $row[3],
            'Contact_phone2' => $row[4],
            'Contact_email' => $row[5],
            'Contact_adress' => $row[6],
            'repertoireReff' => session('RepertImport')
        ]);
        session()->forget('RepertImport');
    }
}
