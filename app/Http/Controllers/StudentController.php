<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;   
use Illuminate\Http\Request;
use App\Models\StudentModel;
use App\Models\LoginModel;
use App\Models\StudFeeModel;
use App\Models\FeeModel;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stus=StudentModel::all();
        return view('SManageStudent',compact('stus'));

    }

    public function admViewStud()
    {
        $stus=StudentModel::all();
        return view('AViewStudent',compact('stus'));

    }

    /*
    public function dues()
    {
        
        $dues = DB::table('student_models')
            ->join('fee_models', 'student_models.course', '=', 'fee_models.course')
            ->select('student_models.name', 'student_models.email','fee_models.total')
            ->where('email','LIKE','mca1@%')
            ->get();
        $flattened = $dues->flatten();
        $flattened->all();
            
        $a="Print";
        $value = $flattened->pluck('email');
        echo "<script>alert('hello.$value.Hello$a.$flattened')</script>";
			
        $results = collect(DB::table('student_models')
            ->select('name','course as student_course')
            ->where('email','LIKE','mca1@%')
            ->get());

        $flattened = $results->flatten();

        $flattened->all();
        
        $chunks=$results->chunk(1);
        dd($chunks);
        return view('student\StudentHome',['flattened'=>$flattened]); 

        $studues=StudFeeModel::all();
        return view('student\StudentHome',compact('studues'));        
    }
    */

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('SAddStudent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $getname=request('stuname');
        $getgen=request('stugen');
        $getcourse=request('stucourse');
        $getglvl=request('stuglvl');
        $getphon=request('stuphone');
        $getemail=request('stuemail');
        $getpass=request('stupass');

        echo "<br>";
        echo $getname;
        echo "<br>";
        echo $getgen;
        echo "<br>";
        echo $getcourse;
        echo "<br>";
        echo $getglvl;
        echo "<br>";
        echo $getphon;
        echo "<br>";
        echo $getemail;
        echo "<br>";
        echo $getpass;
       

        $stu = new StudentModel();

        $stu->name=$getname;
        $stu->phone=$getphon;
        $stu->gender=$getgen;
        $stu->glevel=$getglvl;
        $stu->course=$getcourse;
        $stu->email=$getemail;
        $stu->password=$getpass;
        $stu->save();


        $stulog = new LoginModel();
        $stulog->email=$getemail;
        $stulog->password=$getpass;
        $stulog->utype="Student";
        $stulog->save();

        $getstuid = DB::table('student_models')
            ->select('id')
            ->where('email','LIKE',"$getemail")
            ->first();
        
        $gettot = DB::table('fee_models')
        ->select('total')
        ->where('course','LIKE',"$getcourse")
        ->first();

        $stfee = new StudFeeModel();
        $stfee->sid= $getstuid->id;
        $stfee->name=$getname;
        $stfee->email=$getemail;
        $stfee->glevel=$getglvl;
        $stfee->course=$getcourse;
        $stfee->tot_fees=$gettot->total;
        $stfee->paid=0;
        $stfee->due=$gettot->total;
        $stfee->save();

        return redirect('/ManageStud');
    }

    public function del($id)
    {
        $s=DB::table('student_models')
                ->where('id',$id)
                ->delete();
        return redirect('/ManageStud');
    }

    public function feev(Request $request)
    {
        $logid = $request->session()->get('loggeduser');

        $fee =DB::table('login_models')
        ->join('stud_fee_models', 'login_models.email', '=', 'stud_fee_models.email')
        ->join('fee_models', 'fee_models.course', '=', 'stud_fee_models.course')
        ->select('fee_models.*')
        ->where('login_models.id','=',"$logid")
        ->get();

        return view('TViewFeeStructure',compact('fee'));
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
        $stus=StudentModel::find($id);
        return view('SEditStudent',compact('stus'));
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
        $getname=request('stuname');
        $getphon=request('stuphone');
        
        $stu = StudentModel::find($id);
        $stu->name=$getname;
        $stu->phone=$getphon;
        $stu->save();

        $stfee = StudFeeModel::find($id);
        $stfee->name=$getname;
        $stfee->save();

        return redirect('/ManageStud');
    }

    public function updatepass(Request $request)
    {
        $logid = $request->session()->get('loggeduser');

        $cps=DB::table('login_models')
        ->where('id', '=', $logid)
        ->first();
        
        return view('TChangePassword',compact('cps'));

    }

    public function updtpassdb(Request $request)
    {
        $logid = $request->session()->get('loggeduser');
        $getnpass=request('newpass');

        $updatedval = DB::table('login_models')
            ->join('student_models', 'login_models.email', '=', 'student_models.email')
            ->where('login_models.id','=',"$logid")
            ->update(['login_models.password' => $getnpass,'student_models.password' => $getnpass]);
            return redirect('/changepass')->with('message', 'Password Updated Successfully');
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