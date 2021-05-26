<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PaymentModel;
use App\Models\StudFeeModel;
use App\Models\ReminderModel;
use Carbon\Carbon;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pays=PaymentModel::all();
        return view('AViewPayment',compact('pays'));
    }

    public function staffindex()
    {
        $sfpays=PaymentModel::all();
        return view('SStfViewPayment',compact('sfpays'));    
    }

    public function feedueindex(Request $request)
    {
        $logid = $request->session()->get('loggeduser');
        $sdes = DB::table('login_models')
        ->join('staff_models', 'login_models.email', '=', 'staff_models.email')
        ->select('staff_models.designation as des')
        ->where('login_models.id','=',"$logid")
        ->first();

        if(strcmp($sdes->des,"Clerk1")==0) {
            $dues = DB::table('stud_fee_models')
                    ->whereIn('course', ['MCA','MSC DA'])
                    ->get();
        }
        else if(strcmp($sdes->des,"Clerk2")==0) {
            $dues = DB::table('stud_fee_models')
                    ->whereIn('course', ['BSW','MSW'])
                    ->get();
        }
        else if(strcmp($sdes->des,"Clerk3")==0) {
            $dues = DB::table('stud_fee_models')
                    ->whereIn('course', ['BCOM CA','BSC PSYCHOLOGY'])
                    ->get();
        }
        else {
            echo "<script>
            alert('Sorry you are Not Allowed to view this page');
            window.location.href='/StaffHome';
            </script>";
        }
        
        return view('SViewStudFeeDues',compact('dues'));            
    }

    public function remindercreate($id)
    {
        $remdisp=StudFeeModel::find($id);
        return view('SReminder',compact('remdisp'));
    }

    public function reminderstore(Request $request)
    {
        $logid = $request->session()->get('loggeduserid');
        $getsid=request('stuid');
        $getn=request('stuname');
        $getmsg=request('stumsg');

        if (ReminderModel::where('sid', '=', $getsid)->exists()) {
            $updt = DB::table('reminder_models')
            ->where('reminder_models.sid','=',$getsid)
            ->update(['reminder_models.staffid' => $logid,'reminder_models.message' => $getmsg]);
        }
        else {        
            $rem = new ReminderModel();
            $rem->staffid=$logid;
            $rem->sid=$getsid;
            $rem->name=$getn;
            $rem->message=$getmsg;
            $rem->save();
        }
        return redirect('/StfViewDue');
    }
   

    public function studindex(Request $request)
    {
        $logid = $request->session()->get('loggeduser');

        $stpays = collect(DB::table('login_models')
        ->join('payment_models', 'login_models.email', '=', 'payment_models.email')
        ->select('payment_models.*')
        ->where('login_models.id','=',"$logid")
        ->get());
        
    return view('TViewPayment',compact('stpays'));
    }


    public function studviewreport(Request $request)
    {
        $logid = $request->session()->get('loggeduser');

        $stud = collect(DB::table('login_models')
        ->join('stud_fee_models', 'login_models.email', '=', 'stud_fee_models.email')
        ->select('stud_fee_models.*')
        ->where('login_models.id','=',"$logid")
        ->get());


        $stpays = collect(DB::table('login_models')
        ->join('payment_models', 'login_models.email', '=', 'payment_models.email')
        ->select('payment_models.*')
        ->where('login_models.id','=',"$logid")
        ->get());

        return view('TReport',compact('stud','stpays'));
    
    }


    public function staffviewreport()
    {
        

        $stf = collect(DB::table('payment_models')
        ->join('stud_fee_models', 'payment_models.email', '=', 'stud_fee_models.email')
        ->select('stud_fee_models.course',DB::raw('SUM(payment_models.amount) as total_fee'))
        ->groupBy('course')
        ->get());

        $totfee = collect(DB::table('payment_models')
        ->select(DB::raw('SUM(payment_models.amount) as total_fee'))
        ->get());

        $totstu = collect(DB::table('student_models')
        ->select(DB::raw('count(*) as total_stu'))
        ->get());

        $totdue = collect(DB::table('stud_fee_models')
        ->select(DB::raw('SUM(stud_fee_models.Due) as total_due'))
        ->get());
        

        //dd($totfee);

        return view('SReport',compact('totfee','totstu','totdue','stf'));
    
    }

    public function getamt(Request $request)
    {
        $logid = $request->session()->get('loggeduser');

        $amt =DB::table('login_models')
        ->join('stud_fee_models', 'login_models.email', '=', 'stud_fee_models.email')
        ->select('stud_fee_models.Due')
        ->where('login_models.id','=',"$logid")
        ->first();

        return view('TPayment',compact('amt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('TPayment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function updatedues($logid,$getamt)
    {
        $stufdue = collect(DB::table('login_models')
        ->join('stud_fee_models', 'login_models.email', '=', 'stud_fee_models.email')
        ->select('stud_fee_models.Paid as fpaid','stud_fee_models.Due as fdue')
        ->where('login_models.id','=',"$logid")
        ->first());

        $due=$stufdue->values();
        
        $new_paid=$due['0']+$getamt;
        $new_due=$due['1']-$getamt;
        echo "<br>";
        echo $new_paid;
        echo "<br>";
        echo $new_due;
        
        if($new_due == 0)
        {
            $updatedval = DB::table('login_models')
            ->join('stud_fee_models', 'login_models.email', '=', 'stud_fee_models.email')
            ->where('login_models.id','=',"$logid")
            ->update(['stud_fee_models.Paid' =>"$new_paid",'stud_fee_models.Due'=>"$new_due",'stud_fee_models.status'=>"Paid"]);
        }
        else
        {
            $updatedval = DB::table('stud_fee_models')
            ->join('login_models', 'login_models.email', '=', 'stud_fee_models.email')
            ->update(['stud_fee_models.Paid'=>"$new_paid",'stud_fee_models.Due'=>"$new_due"])
            ->where('login_models.id','=',$logid);
        }
    }
    // DB::update('update student set name = ? where id = ?',[$name,$id]);

    public function store(Request $request)
    {
        $getamt=request('payamt');
        $gettid = uniqid('TXN');
        $getcurrent_date_time = Carbon::now()->toDateTimeString();

        echo $gettid;
        echo "<br>";
        echo $getamt;
        echo "<br>";
        echo $getcurrent_date_time;


        $logid = $request->session()->get('loggeduser');

        $stu = collect(DB::table('login_models')
        ->join('student_models', 'login_models.email', '=', 'student_models.email')
        ->select('student_models.id as stid','student_models.name as stname','student_models.email as stmail')
        ->where('login_models.id','=',"$logid")
        ->first());

        $svalue=$stu->values();
                
        $pay = new PaymentModel();
        $pay->sid=$svalue['0'];
        $pay->name=$svalue['1'];
        $pay->email=$svalue['2'];
        $pay->transactionid=$gettid;
        $pay->date=$getcurrent_date_time;
        $pay->amount=$getamt;
        
        $pay->save();

        $this->updatedues($logid,$getamt);

        return redirect('/paysuccess');         
    }

    

    public function psuccess()
    {
        return view('TPaySuccess');
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
