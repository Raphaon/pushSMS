<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class ProjectController extends Controller
{


    public function index()
    {
        if (!Session::has('customer') or !session('customer')->isAuth) {
            return redirect('login');
        }
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
