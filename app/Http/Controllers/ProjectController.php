<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Mail;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
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

    public function new()
    {
        return view('Project/new');
    }

    public function __construct(Customer $customer)
    {
        if(session()->has('customer'))
            $this->customerReff = session('customer')->customerID;    
    }

    public function store(Request $request)
    {
        request()->validate(['name'=>['required']]);
        
        $project = new Project();
        $project->project_name = strtoupper(request('name'));
        $project->project_label = strtoupper(request('label'));
        $project->api_key = sha1(md5(session('customerID').request('name')));
        $project->Commentaire = request('comment');
        $project->customerReff = session('customer')->customerID;
        $mss = 'Hello '.session('customer')->customerName.' , 
        your new project have been created successfuly.
        Here is your api key : '.$project->api_key.
        ' to execute query here is the link Api : 


          Method GET : '
          . 
        route('sendGetMessage', [
            'apiKey'=> $project->api_key,
            'from' => "LABEL",
            'to'=> '650786923',
            'message'=>'Hello your Api work']).'
            
            Methode POST \n


            send this data   
            Message { 
                "apikey": "Your key api",
                
                "from ": "the-label-whow-the-message-send",
                
                "to" : "the-number-to-whom-you-are-sending-the-message",

                "message": "your message"\n
            }

            apikey : the api your receive

            from : the label you want to see appearing as the sender
            to : the number of the person you want to send the message

            message : the message you want to send to the person            

            to the link '
            . route("sendPostMessage").

            ' Please Fill free to contact us for any support or consutate our documenttation';

        if($project->isExist()){
            $request->session()->flash('msg',  'A project exist already with that name ');
            
        }else
        {
            if($project->save())
            {

                $mail = new Mail();
                $mail->to = session('customer')->email;
                $mail->subject = 'API PROJECT SETTING';
                $mail->content = $mss;
                $mail->send();
                $request->session()->flash('msg',  'Your project have been created successfully');
                
            }else
            {
                $request->session()->flash('msg', "We encounter an error while creating your project ");
               
            }
        }

      return redirect()->back();
    }
}
