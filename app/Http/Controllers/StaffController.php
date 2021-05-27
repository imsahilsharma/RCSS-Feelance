<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\DB;
use App\Models\StaffModel;
use App\Models\LoginModel;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stfs=StaffModel::all();
        return view('AManageStaff',compact('stfs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AAddStaff');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();
       

        $getname=request('sname');
        $getdesg=request('sdesig');
        $getgen=request('sgender');
        $getphon=request('sphone');
        $getemail=request('semail');
        $getpass=request('spass');
       

        echo "<br>";
        echo $getname;
        echo "<br>";
        echo $getdesg;
        echo "<br>";
        echo $getgen;
        echo "<br>";
        echo $getphon;
        echo "<br>";
        echo $getemail;
        echo "<br>";
        echo $getpass;
       

        $stf = new StaffModel();
        $stf->name=$getname;
        $stf->designation=$getdesg;
        $stf->gender=$getgen;
        $stf->phone=$getphon;
        $stf->email=$getemail;
        $stf->password=$getpass;
        $stf->save();

        $slog = new LoginModel();
        $slog->email=$getemail;
        $slog->password=$getpass;
        $slog->utype="Staff";
        $slog->save();

        return redirect('/ManageStaff');
    }

    public function del($id)
    {
        $s=DB::table('staff_models')
                ->where('id',$id)
                ->delete();
        return redirect('/ManageStaff');
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
        $stf=StaffModel::find($id);
        return view('AEditStaff',compact('stf'));
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
        $getname=request('sname');
        $getdesg=request('sdesig');
        $getphon=request('sphone');
           
        

        $stf = StaffModel::find($id);
        $stf->name=$getname;
        $stf->designation=$getdesg;
        $stf->phone=$getphon;
        
        $stf->save();
        return redirect('/ManageStaff');

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

    public function updatestfpass(Request $request)
    {
        $logid = $request->session()->get('loggeduser');

        $cps=DB::table('login_models')
        ->where('id', '=', $logid)
        ->first();
        
        return view('SChangePassword',compact('cps'));

    }

    public function updtstfpassdb(Request $request)
    {
        $logid = $request->session()->get('loggeduser');
        $getnpass=request('newpass');

        $updatedval = DB::table('login_models')
            ->where('login_models.id','=',"$logid")
            ->update(['login_models.password' => $getnpass]);

        $updated = DB::table('staff_models')
            ->join('login_models', 'login_models.email', '=', 'staff_models.email')
            ->where('login_models.id','=',"$logid")
            ->update(['login_models.password' => $getnpass,'staff_models.password' => $getnpass]);

            return redirect('/stfchangepass')->with('message', 'Password Updated Successfully');
    }

    public function stfReport()
    {
        return view('SReportHome');
    }

    public function staffviewreport()
    {
        

        $stf = collect(DB::table('stud_fee_models')
        ->select('stud_fee_models.course',DB::raw('SUM(paid) as total_fee'),DB::raw('SUM(due) as total_cdue'))
        ->groupBy('course')
        ->get());

        $totfee = collect(DB::table('payment_models')
        ->select(DB::raw('SUM(payment_models.amount) as total_fee'))
        ->get());

        $totstu = collect(DB::table('student_models')
        ->select(DB::raw('count(*) as total_stu'))
        ->get());
        $totdue = collect(DB::table('stud_fee_models')
        ->select(DB::raw('SUM(stud_fee_models.due) as total_due'))
        ->get());
        
        
        return view('SReport',compact('totfee','totstu','totdue','stf'));
    
    }
    public function staffviewreport2()
    {
        

        $payment = collect(DB::table('payment_models')
        ->select('payment_models.*')
        ->get());

        $totpay = collect(DB::table('payment_models')
        ->select(DB::raw('SUM(payment_models.amount) as total_pay'))
        ->get());

        $tottxn = collect(DB::table('payment_models')
        ->select(DB::raw('count(*) as total_txn'))
        ->get());
        
        
        
        return view('SReportPayment',compact('totpay','tottxn','payment'));
    
    }
}
