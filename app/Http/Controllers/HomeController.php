<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servicecenter;
use App\Servicerequest;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $centers=Servicecenter::all();
        //print_r($centers);
        return view('home',compact('centers'));
    }
    public function serviceRequestsView()
    {
        $centers=Servicecenter::all();
        return view('servicerequest',compact('centers'));
    }
   /* protected function validator(array $data)
    {
        return Validator::make($data, [
            'serviceid' => ['required'],
            'catname' => ['required', 'string', 'max:255'],
            'vname' => ['required', 'string','max:255'],
            'vmodel' => ['required', 'string'],
            'vbrand' => ['required'],
            'ph' =>['required','regex:/^[0-9]{10}$/'],
            'sdate'=>['required'],
            'stime'=>['required'],
        ]);
    }*/
    public function createServiceRequest(Request $request)
    {
        //$this->validator($request->all())->validate();
        $request->validate([
            'serviceid' => 'required',
            'catname' => 'required',
            'vname' =>  'required',
            'vmodel' => 'required',
            'vbrand' => 'required',
            'sdate'=>'required',
            'stime'=>'required',
           
        ]);
        $admin = Servicerequest::create([
            'customerid' =>Auth::user()->id,
            'serviceid' => $request['serviceid'],
            'catname' => $request['catname'],
            'vname' => $request['vname'],
            'vmodel' => $request['vmodel'],
            'vbrand' => $request['vbrand'],
            'sdate' => $request['sdate'],
            'stime' => $request['stime'],
            'request_status' => 'pending',
            'request_type' => 1,
            'service_charge' => 0,
           
        ]);
        return redirect()->intended('home/servicerequest')->with('success','Service  Requested Successfully');
    }
    public function serviceRequestsHistoryView()
    {
        $requests = DB::table('servicerequests')
            ->join('users', 'users.id', '=', 'servicerequests.customerid')
            ->join('servicecenters', 'servicecenters.sid', '=', 'servicerequests.serviceid')
            ->select('users.*', 'servicerequests.*','servicecenters.*')
            ->where('id',Auth::user()->id)
            ->get();
        $histories= DB::table('service_status')
        ->join('servicerequests', 'servicerequests.rid', '=', 'service_status.reqid')
        ->join('users', 'users.id', '=', 'servicerequests.customerid')
        ->join('service_doneby', 'servicerequests.rid', '=', 'service_doneby.rqid')
        ->select('users.*', 'servicerequests.*','service_doneby.*','service_status.*')
        ->where('id',Auth::user()->id)
        ->get();
        
        return view('servicerequesthistory',compact('requests','histories'));
    }
    public function payServiceRequests(Request $request)
    {
        $np=$request->np;
        DB::table('servicerequests')
        ->where('rid',$request->rid)
        ->update([
        'request_status'=>'paid']);
        return redirect()->route('srview')
        ->with('success','Payment Successfull,Thank You.');
      
    }
    public function partRequestsView()
    {
        $centers=Servicecenter::all();
        //$parts=
        $parts = DB::table('parts')->get();
        return view('partsrequest',compact('centers','parts'));
    }
    public function createpartsRequest(Request $request)
    {
       /* return Validator::make($request, [
            'servicename' => ['required'],
            'part' => ['required'],
            'noofpart' =>  ['required'],
        ]);*/
        $request->validate([
            'servicename' => 'required',
            'part' => 'required',
            'noofpart' =>  'required',
            
           
        ]);
        DB::table('partsrequest')->insert(
            [
            'serviceid'=>$request->servicename,
            'vpid' =>$request->part,
            'customerid' =>Auth::user()->id,
            'noofparts' =>$request->noofpart,
            'request_status' =>'pending',
            'tot_price'=>'Request should be accepted'
            ]);
            return redirect()->route('prview')
            ->with('success','Service Completed successfully.');

    }
    public function partRequestsHistoryView()
    {
        $requests = DB::table('partsrequest')
            ->join('servicecenters', 'servicecenters.sid', '=', 'partsrequest.serviceid')
            ->join('parts', 'parts.pid', '=', 'partsrequest.vpid')
            ->select('partsrequest.*','servicecenters.*','parts.*')
            ->where('customerid',Auth::user()->id)
            ->get();
        return view('partsrequesthistory',compact('requests'));
    }
    public function payPartRequests(Request $request)
    {
        $np=$request->np;
        DB::table('partsrequest')
        ->where('cprid',$request->cprid)
        ->update([
        'request_status'=>'paid']);

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $transnum = '';
        for ($i = 0; $i < 8; $i++) {
            $transnum .= $characters[rand(0, $charactersLength - 1)];
        }
        
        DB::table('transaction_parts')->insert(
            [
            'secenid' =>$request->sid,
            'amount'=>$request->amount*$np,
            'dot' =>date('Y-m-d'),
            'prid'=>$request->cprid,
            'cuuid'=>Auth::user()->id,
            'transactionnumber'=>$transnum
            
            ]);
       
        return redirect()->route('prview')
        ->with('success','Payment Successfull,Thank You.');
      
    }
    public function showServiceBill($id)
    {
        $requests = DB::table('servicerequests')
        ->join('users', 'users.id', '=', 'servicerequests.customerid')
        ->join('servicecenters', 'servicecenters.sid', '=', 'servicerequests.serviceid')
        ->select('users.*', 'servicerequests.*','servicecenters.*')
        ->where('rid',$id)
        ->get();
        $userdetails = DB::table('servicerequests')
        ->join('users', 'users.id', '=', 'servicerequests.customerid')
        ->select('users.*', 'servicerequests.*')
        ->where('rid',$id)
        ->get();
    $histories= DB::table('service_status')
    ->join('servicerequests', 'servicerequests.rid', '=', 'service_status.reqid')
    ->join('users', 'users.id', '=', 'servicerequests.customerid')
    ->join('service_doneby', 'servicerequests.rid', '=', 'service_doneby.rqid')
    ->select('users.*', 'servicerequests.*','service_doneby.*','service_status.*')
    ->where('id',Auth::user()->id)
    ->get();
        return view('userservicebill',compact('requests','histories','userdetails'));
    }
    public function showPartBill($id)
    {
        $requests = DB::table('partsrequest')
            ->join('servicecenters', 'servicecenters.sid', '=', 'partsrequest.serviceid')
            ->join('parts', 'parts.pid', '=', 'partsrequest.vpid')
            ->select('partsrequest.*','servicecenters.*','parts.*')
            ->where('customerid',Auth::user()->id)
            ->where('cprid',$id)
            ->get();
        $userdetails = DB::table('partsrequest')
            ->join('users', 'users.id', '=', 'partsrequest.customerid')
            ->select('users.*', 'partsrequest.*')
            ->where('cprid',$id)
            ->get();
        $bills = DB::table('partsrequest')
            ->join('users', 'users.id', '=', 'partsrequest.customerid')
            ->join('parts', 'parts.pid', '=', 'partsrequest.vpid')
            ->join('transaction_parts','transaction_parts.prid','=','partsrequest.cprid')
            ->select('users.*', 'partsrequest.*','transaction_parts.*','parts.*')
            ->where('cprid',$id)
            ->get();
        return view('userpartbill',compact('requests','userdetails','bills'));
    }
    public function changepasswordView()
    {
      return view('userchangepassword');  
    }
    public function changepasswordAction(Request $request)
    {
        /*$udetails = DB::table('users')
        ->where('id',Auth::user()->id)
        ->first(); 
        echo $currentpswd=$udetails->password;
        echo $npswd=Hash::make($request->np);*/
        if (!(Hash::check($request->get('cp'), Auth::user()->password))) {
            // The passwords not matches
            //return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
            return redirect()->route('changeupview')
            ->with('danger','Your current password does not matches with the password you provided. Please try again.');  
        }
        //uncomment this if you need to validate that the new password is same as old one

        if(strcmp($request->get('cp'), $request->get('np')) == 0){
            //Current password and new password are same
            //return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
            return redirect()->route('changeupview')
            ->with('danger','New Password cannot be same as your current password. Please choose a different password..');
        }
        if($request->get('np')!=$request->get('rnp')){
            //Current password and new password are same
            //return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
            return redirect()->route('changeupview')
            ->with('danger','Retype Password Mismatch,Try Again');
        }
      
        //Change Password
        $user = Auth::user();
        $user->password = Hash::make($request->get('np'));
        $user->save();
        return redirect()->route('changeupview')
        ->with('success','Password Changed Successfully');
       


    }
}
