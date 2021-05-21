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
        return view('admin\ManageStaff',compact('stfs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin\AddStaff');
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
        return view('admin\EditStaff',compact('stf'));
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
}
