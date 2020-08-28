<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table ='project';

    public function isExist()
    {
        if(
            Project::where('customerReff', session('customer')->customerID)
                    ->where('project_name', $this->project_name)
                    ->count()>0)
                    return true ;
        return false ;
    }

}
