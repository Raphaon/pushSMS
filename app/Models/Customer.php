<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable as AuthAuthenticatable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model implements Authenticatable
{
    protected $table = 'customer';
    public $isAuth = false;
    use AuthAuthenticatable;
    
    public function isExist()
    {
        if(Customer::where('email', $this->email)->count()>0)
        {
            return true;
        }
        return false;
    }

    public function getProject()
    {
        return Project::where('customerID', $this->reffCustomer)->get();
    }

    public function getMessage()
    {
        return Message::where('customerID', $this->reffCustomer)->get();
    }

    public function getAvailablleSMS()
    {
        return Forfais::where('customerReff', $this->customerID)->sum('remainingSMS');
    }

    public function getForfais()
    {
        return Forfais::where('customerReff', $this->customerID)->get();
    }


    public function repertoire()
    {
        return Repertoire::where('customerID', $this->reffCustomer)->get();
    }



    public function isAuth()
    {
        return true;
    }
}
