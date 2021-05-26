<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;   
use Illuminate\Http\Request;
use App\Models\LoginModel;
use App\Models\ReminderModel;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
 
   public function store(Request $request)
    {
        $getemail=request('lemail');
        $getpass=request('lpass');
        echo $getemail;
        echo $getpass;

        $log=new LoginModel();
        $log->email=$getemail;
        $log->password=$getpass;
        $log->utype="Admin";
        $log->save();

        return redirect('/');
    }
    public function createadm()
    {
        return view('Aadminsignup');
    }


    public function check(Request $request)
    {

        $admin="Admin";
        $staff="Staff";
        $stud="Student";

        $userInfo =LoginModel::where('email','=',$request->lemail)->first(); 
        if(!$userInfo)
        {
            return back()->with('fail','Error: Invalid Login');
        }
        else
        {
            if(strcmp($request->lpass,$userInfo->password)==0)
            {
                $request-> session()->put('loggeduser', $userInfo->id);
                if (strcmp($admin, $userInfo->utype)==0) {
                    return redirect('/AdminHome');
                }     
                else if (strcmp($staff, $userInfo->utype)==0) {
                    return redirect('/StaffHome');
                }     
                else if (strcmp($stud, $userInfo->utype)==0) {
                    return redirect('/StudentHome');
                }     
            }
            else
            {
                return back()->with('fail','Error: Invalid Login');
            } 
        }
    }
   

    public function adminHomeView()
    {
        
        $registers=LoginModel::all();
        $data=['LoggedUserinfo'=>LoginModel::where('id','=',session('loggeduser'))->first()];
        return view('AAdminHome',compact('registers'),$data);
    }

    public function staffHomeView(Request $request)
    {
        
        $logid = $request->session()->get('loggeduser');

        $stfdet = collect(DB::table('login_models')
        ->join('staff_models', 'login_models.email', '=', 'staff_models.email')
        ->select('staff_models.*')
        ->where('login_models.id','=',"$logid")
        ->get());
    
        $request-> session()->put('loggeduserid', $stfdet['0']->id);
        return view('SStaffHome',compact('stfdet'));  
    }

    public function studHomeView(Request $request)
    {
        
      //  $registers=LoginModel::all();
        //$data=['LoggedUserinfo'=>LoginModel::where('id','=',session('loggeduser'))->first()];
       // return view('student\StudentHome',compact('registers'),$data);

        $logid = $request->session()->get('loggeduser');

        $stufeedues = collect(DB::table('login_models')
        ->join('stud_fee_models', 'login_models.email', '=', 'stud_fee_models.email')
        ->select('stud_fee_models.*')
        ->where('login_models.id','=',"$logid")
        ->get());
        
        $msg = ReminderModel::where('sid', '=', $stufeedues['0']->sid)->first();
       
        return view('TStudentHome',compact('stufeedues','msg'));    
    }

    public function lgout()
    {
        if(session()->has('loggeduser'))
        {
            session()->pull('loggeduser');
            session()->flush();
            return redirect('/login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
