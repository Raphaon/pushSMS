<?php

namespace App\Http\Controllers;

use App\Imports\ContactsImport;
use Illuminate\Http\Request;
use App\Models\Repertoire;
use DB;
use Excel;
class ContactController extends Controller
{
    public function import() 
    {
        $repertoires = Repertoire::where('customerReff', session('customer')->customerID)->get();
        return view('Contact.Import', compact('repertoires'));
    }

    public function importTraitment(Request $request)
    {
        request()->validate([
            'fileContacts'=> ['required', 'mimes:xlsx, xls,csv'], 
            'repertoire'=> ['required']
        ]);

        $contactsFile = $request->file('fileContacts');
        
        $request->session()->put('RepertImport', request('repertoire'));
        Excel::import(new ContactsImport, $contactsFile);
        $request->session()->flash('status','Your Contacts have been Imported Successfully !!');
        return back();
    }

    

}
