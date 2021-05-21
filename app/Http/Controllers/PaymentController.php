<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PaymentModel;
use App\Models\StudFeeModel;
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
        return view('admin\ViewPayment',compact('pays'));
    }

    public function staffindex()
    {
        $sfpays=PaymentModel::all();
        return view('staff\StfViewPayment',compact('sfpays'));    
    }
   
    public function studindex(Request $request)
    {
        $logid = $request->session()->get('loggeduser');

        $stpays = collect(DB::table('login_models')
        ->join('payment_models', 'login_models.email', '=', 'payment_models.email')
        ->select('payment_models.*')
        ->where('login_models.id','=',"$logid")
        ->get());
        
    return view('student\ViewPayment',compact('stpays'));
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

        return view('student\Report',compact('stud','stpays'));
    
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
        ->select(DB::raw('SUM(stud_fee_models.due) as total_due'))
        ->get());
        

        //dd($totfee);

        return view('staff\Report',compact('totfee','totstu','totdue','stf'));
    
    }

    public function getamt(Request $request)
    {
        $logid = $request->session()->get('loggeduser');

        $amt =DB::table('login_models')
        ->join('stud_fee_models', 'login_models.email', '=', 'stud_fee_models.email')
        ->select('stud_fee_models.due')
        ->where('login_models.id','=',"$logid")
        ->first();

        return view('student\Payment',compact('amt'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student\Payment');
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
        ->select('stud_fee_models.paid as fpaid','stud_fee_models.due as fdue')
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
            ->update(['stud_fee_models.paid' => $new_paid],['stud_fee_models.due' => $new_due],['stud_fee_models.status' => "Paid"]);
        }
        else
        {
            $updatedval = DB::table('login_models')
            ->join('stud_fee_models', 'login_models.email', '=', 'stud_fee_models.email')
            ->where('login_models.id','=',"$logid")
            ->update(['stud_fee_models.paid' => $new_paid,'stud_fee_models.due' => $new_due]);
        }
    }


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
        return view('student\PaySuccess');
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
