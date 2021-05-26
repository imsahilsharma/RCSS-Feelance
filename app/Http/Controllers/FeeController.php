<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;   
use Illuminate\Http\Request;
use App\Models\FeeModel;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fees=FeeModel::all();
        return view('SManageFeeStructure',compact('fees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('SAddFeeStructure');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function viewCoursewithFee()
    {
        $results = collect(DB::table('fee_models')
            ->select('course')
            ->get());

            $flattened = $results->flatten();
            $flattened->all();
            
            return view('SAddStudent',['flattened'=>$flattened]);
    }

    public function store(Request $request)
    {
        $getlvl=request('fglvl');
        $getcourse=request('fcourse');
        $getcou=request('coufee');
        $gettut=request('tutfee');
        $getvaep=request('vaepfee');
        $gettot=request('tot');

        echo "<br>";
        echo $getlvl;
        echo "<br>";
        echo $getcourse;
        echo "<br>";
        echo $getcou;
        echo "<br>";
        echo $gettut;
        echo "<br>";
        echo $getvaep;
        echo "<br>";
        echo $gettot;       

        $logid = $request->session()->get('loggeduser');

        $stfid = DB::table('login_models')
        ->join('staff_models', 'login_models.email', '=', 'staff_models.email')
        ->select('staff_models.id as stid')
        ->where('login_models.id','=',"$logid")
        ->first();
            
       
        $fee = new FeeModel();
        $fee->staffid= $stfid->stid;
        $fee->glevel=$getlvl;
        $fee->course=$getcourse;
        $fee->coursefee=$getcou;
        $fee->tutionfee=$gettut;
        $fee->vaepfee=$getvaep;
        $fee->total=$gettot;
        $fee->save();

        return redirect('/ManageFee');
    }

    public function del($id)
    {
        $s=DB::table('fee_models')
                ->where('id',$id)
                ->delete();
        return redirect('/ManageFee');
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
