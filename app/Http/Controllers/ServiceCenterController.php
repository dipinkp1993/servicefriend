<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class ServiceCenterController extends Controller
{
    public function index()
    {
        
        $srequests = DB::table('servicerequests')
        ->join('servicecenters', 'servicecenters.sid', '=', 'servicerequests.serviceid')
        ->where('sid',Auth::guard('servicecenter')->user()->sid)
        ->get();
        $userreq=count($srequests);
        $prequests = DB::table('partsrequest')
        ->join('servicecenters', 'servicecenters.sid', '=', 'partsrequest.serviceid')
        ->where('sid',Auth::guard('servicecenter')->user()->sid)
        ->get();
         $partreq=count($prequests);
         $prequestswsadmin = DB::table('partsrequesttows')
        ->join('servicecenters', 'servicecenters.sid', '=', 'partsrequesttows.serviid')
        ->where('sid',Auth::guard('servicecenter')->user()->sid)
        ->get();
        $partreqws=count($prequestswsadmin);
        return view('auth.servicedashboard',['urequests'=>$userreq,'prequests'=>$partreq,'prequestsws'=>$partreqws]);
      
    }
    public function showServiceRequests()
    {
        
        $requests = DB::table('servicerequests')
        ->join('users', 'users.id', '=', 'servicerequests.customerid')
        ->join('servicecenters', 'servicecenters.sid', '=', 'servicerequests.serviceid')
       
        ->select('users.*', 'servicerequests.*','servicecenters.*')
        ->where('sid',Auth::guard('servicecenter')->user()->sid)
        ->get();
        $sdones= DB::table('servicerequests')
       
        ->join('servicecenters', 'servicecenters.sid', '=', 'servicerequests.serviceid')
        ->join('service_doneby', 'service_doneby.rqid', '=', 'servicerequests.rid')
        ->select('servicerequests.*','servicecenters.*','service_doneby.*')
        ->where('sid',Auth::guard('servicecenter')->user()->sid)
        ->get();
        return view('auth.userservicerequests',compact('requests','sdones'));
      
    }
    
    public function updateServiceRequests(Request $request)
    {
        
        DB::table('servicerequests')
        ->where('rid',$request->rid)
        ->update(['sdate'=>$request->sdate,
        'stime'=>$request->stime,
        'request_status'=>$request->status]);
        DB::table('service_status')->insert(
            [
            'reqid'=>$request->rid,
            'customid' =>$request->cid,
            'datstatus' => date('d-m-y'),
            'status'=>$request->status
            ]);
        return redirect()->route('ureqview')
        ->with('success','Status changed successfully.');
      
    }
    public function completeServiceRequests(Request $request)
    {
        
        DB::table('servicerequests')
        ->where('rid',$request->rid)
        ->update([
        'service_charge'=>$request->scharge,
        'request_status'=>'completed']);
        DB::table('service_doneby')->insert(
            [
            'rqid'=>$request->rid,
            'mname' =>$request->sdoneby,
            'remarks' =>$request->remarks
            ]);
        DB::table('service_status')->insert(
                [
                'reqid'=>$request->rid,
                'customid' =>$request->cid,
                'datstatus' => date('d-m-y'),
                'status'=>'completed'
                ]);
        return redirect()->route('ureqview')
        ->with('success','Service Completed successfully.');
      
    }
    public function showInvoice($id)
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
        $sdones= DB::table('servicerequests')
       
        ->join('servicecenters', 'servicecenters.sid', '=', 'servicerequests.serviceid')
        ->join('service_doneby', 'service_doneby.rqid', '=', 'servicerequests.rid')
        ->select('servicerequests.*','servicecenters.*','service_doneby.*')
        ->where('rid',$id)
        ->get();
        
        return view('auth.serviceinvoice',compact('requests','sdones','userdetails'));
      
    }
    public function partRequestsHistoryView()
    {
        $requests = DB::table('partsrequest')
            ->join('servicecenters', 'servicecenters.sid', '=', 'partsrequest.serviceid')
            ->join('users','users.id', '=', 'partsrequest.customerid')
            ->join('parts', 'parts.pid', '=', 'partsrequest.vpid')
            ->select('partsrequest.*','servicecenters.*','parts.*','users.*')
            ->where('sid',Auth::guard('servicecenter')->user()->sid)
            ->get();
        return view('auth.partsrequesthistorysc',compact('requests'));
    }
    public function updatePartRequests(Request $request)
    {
        
        DB::table('partsrequest')
        ->where('cprid',$request->cprid)
        ->update([
        'request_status'=>$request->status]);
       
        return redirect()->route('upreqview')
        ->with('success','Status changed successfully.');
      
    }
    public function partRequestsViewadmin()
    {
        
        //$parts=
        $parts = DB::table('parts')->get();
        return view('auth.partrequeststows',compact('parts'));
    }
    public function createpartsRequestTows(Request $request)
    {
       /* return Validator::make($request, [
            'servicename' => ['required'],
            'part' => ['required'],
            'noofpart' =>  ['required'],
        ]);*/
        $request->validate([
            'part' => 'required',
            'noofpart' =>  'required',
            
           
        ]);
        DB::table('partsrequesttows')->insert(
            [
            'serviid'=>Auth::guard('servicecenter')->user()->sid,
            'parid' =>$request->part,
            'numparts' =>$request->noofpart,
            'reqstatus' =>'pending',
            ]);
            return redirect()->route('prtoadmin')
            ->with('success','Part Requested successfully.');

    }
    public function partRequestsTowsHistoryView()
    {
        $requests = DB::table('partsrequesttows')
            ->join('servicecenters', 'servicecenters.sid', '=', 'partsrequesttows.serviid')
            ->join('parts', 'parts.pid', '=', 'partsrequesttows.parid')
            ->select('partsrequesttows.*','servicecenters.*','parts.*')
            ->where('serviid',Auth::guard('servicecenter')->user()->sid)
            ->get();
        return view('auth.partsrequesttows',compact('requests'));
    }
    public function payPartRequests(Request $request)
    {
        $np=$request->np;
        DB::table('partsrequesttows')
        ->where('prwid',$request->prwid)
        ->update([
        'reqstatus'=>'paid']);
        $stocks = DB::table('parts_stock')
                  ->where('partid',$request->pid)
                  ->first();
        $stock_quanity=$stocks->stock_quantity;
        $new_stock=$stocks->stock_quantity-$np;
        DB::table('parts_stock')
        ->where('partid',$request->pid)
        ->update([
        'stock_quantity'=>$new_stock]);
        return redirect()->route('upreqview')
        ->with('success','Payment Successfull,Thank You.');
      
    }
    public function showPartBill($id)
    {
        $requests = DB::table('partsrequesttows')
            ->join('servicecenters', 'servicecenters.sid', '=', 'partsrequesttows.serviid')
            ->join('parts', 'parts.pid', '=', 'partsrequesttows.parid')
            ->select('partsrequesttows.*','servicecenters.*','parts.*')
            ->where('prwid',$id)
            ->get();
       
        return view('auth.servicepartbill',compact('requests'));
    }
    public function changepasswordView()
    {
      return view('auth.centerchangepassword');  
    }
    public function changepasswordAction(Request $request)
    {
        /*$udetails = DB::table('users')
        ->where('id',Auth::user()->id)
        ->first(); 
        echo $currentpswd=$udetails->password;
        echo $npswd=Hash::make($request->np);*/
        if (!(Hash::check($request->get('cp'), Auth::guard('servicecenter')->user()->password))) {
            // The passwords not matches
            //return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
            return redirect()->route('changescpview')
            ->with('danger','Your current password does not matches with the password you provided. Please try again.');  
        }
        //uncomment this if you need to validate that the new password is same as old one

        if(strcmp($request->get('cp'), $request->get('np')) == 0){
            //Current password and new password are same
            //return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
            return redirect()->route('changescpview')
            ->with('danger','New Password cannot be same as your current password. Please choose a different password..');
        }
        if($request->get('np')!=$request->get('rnp')){
            //Current password and new password are same
            //return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
            return redirect()->route('changescpview')
            ->with('danger','Retype Password Mismatch,Try Again');
        }
      
        //Change Password
        $user = Auth::guard('servicecenter')->user();
        $user->password = Hash::make($request->get('np'));
        $user->save();
        return redirect()->route('changescpview')
        ->with('success','Password Changed Successfully');
       


    }
}
