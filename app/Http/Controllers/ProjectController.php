<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{


    public function index()
    {
        $projects = session('customer')->getProjects();
       // dd($projects);
        return view('Project.index', compact('projects'));
    }

    public function __construct(Customer $customer)
    {
        if(session()->has('customer'))
            $this->customerReff = session('customer')->customerID;    
    }
}
