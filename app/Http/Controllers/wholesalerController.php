<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class wholesalerController extends Controller
{
    public function index()
    {
        
       $prequestswsadmin = DB::table('partsrequesttows')
        ->join('servicecenters', 'servicecenters.sid', '=', 'partsrequesttows.serviid')
        ->get();
        
        $partreqws=count($prequestswsadmin);
        $parts = DB::table('parts')
        ->get();
        $pcounts=count($parts);
        return view('auth.wholesalerdashboard',['prequestsws'=>$partreqws,'pcount'=>$pcounts]);
      
    }
    public function managepartView()
    {
        
       
        return view('auth.managepart');
      
    }
    public function managepartAdd(Request $request)
    {
        
        DB::table('parts')->insert(
            [
            'pname'=>$request->pname,
            'pslno'=>$request->pnumber,
            'price'=>$request->price
            ]);
        return redirect()->route('viewaddedpart')
        ->with('success','Part Added successfully.');
        
      
    }
    public function viewAddedpart()
    {
        $parts = DB::table('parts')->get();
        return view("auth.viewparts",compact('parts'));
       
        
      
    }
    public function updateParts(Request $request)
    {
        
        DB::table('parts')
        ->where('pid',$request->pid)
        ->update(['pname'=>$request->pname,
        'pslno'=>$request->pnumber,
        'price'=>$request->price]);
        return redirect()->route('viewaddedpart')
        ->with('success','Part updated successfully.');
      
    }
    public function managestockView()
    {
        
        $parts = DB::table('parts')->get();
        return view('auth.managestock',compact('parts'));
      
    }
    public function managestockAdd(Request $request)
    {
        $checker= DB::table('parts_stock')
        ->where('partid',$request->pid)
        ->first();
        if (is_null($checker)) {
            
            DB::table('parts_stock')->insert(
                [
                'partid'=>$request->pid,
                'stock_quantity'=>$request->sq
                ]);
            return redirect()->route('viewaddedpart')
            ->with('success','Stock Added successfully.');
         }
         else
         {
            return redirect()->route('viewaddedpart')
            ->with('warning','Stock Already Added.Check StockList For updation');
         }
        
        
      
    }
    public function viewAddedstock()
    {
        $requests = DB::table('parts_stock')
            ->join('parts', 'parts.pid', '=', 'parts_stock.partid')
            ->select('parts.*','parts_stock.*')
            ->get();
        return view("auth.viewstocks",compact('requests'));
       
        
      
    }
    public function updateStock(Request $request)
    {
        
        DB::table('parts_stock')
        ->where('stockid',$request->stoid)
        ->update(['stock_quantity'=>$request->sq,
       ]);
        return redirect()->route('viewaddedstock')
        ->with('success','Stock updated successfully.');
      
    }
    public function partRequestswsHistoryView()
    {
        $requests = DB::table('partsrequesttows')
            ->join('servicecenters', 'servicecenters.sid', '=', 'partsrequesttows.serviid')
            ->join('parts', 'parts.pid', '=', 'partsrequesttows.parid')
            ->join('parts_stock', 'parts_stock.partid', '=', 'partsrequesttows.parid')
            ->select('partsrequesttows.*','servicecenters.*','parts.*','parts_stock.*')
            ->get();
        return view('auth.partsrequestwshistory',compact('requests'));
    }
    public function updatePartRequestsWs(Request $request)
    {
        
        DB::table('partsrequesttows')
        ->where('prwid',$request->prwid)
        ->update([
        'reqstatus'=>$request->status]);
       
        return redirect()->route('partreq')
        ->with('success','Status changed successfully.');
      
    }
     public function changepasswordView()
    {
      return view('auth.wsadminchangepassword');  
    }
    public function changepasswordAction(Request $request)
    {
        /*$udetails = DB::table('users')
        ->where('id',Auth::user()->id)
        ->first(); 
        echo $currentpswd=$udetails->password;
        echo $npswd=Hash::make($request->np);*/
        if (!(Hash::check($request->get('cp'), Auth::guard('wholesaler')->user()->password))) {
            // The passwords not matches
            //return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
            return redirect()->route('changewspasswordview')
            ->with('danger','Your current password does not matches with the password you provided. Please try again.');  
        }
        //uncomment this if you need to validate that the new password is same as old one

        if(strcmp($request->get('cp'), $request->get('np')) == 0){
            //Current password and new password are same
            //return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
            return redirect()->route('changewspasswordview')
            ->with('danger','New Password cannot be same as your current password. Please choose a different password..');
        }
        if($request->get('np')!=$request->get('rnp')){
            //Current password and new password are same
            //return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
            return redirect()->route('changewspasswordview')
            ->with('danger','Retype Password Mismatch,Try Again');
        }
      
        //Change Password
        $user = Auth::guard('wholesaler')->user();
        $user->password = Hash::make($request->get('np'));
        $user->save();
        return redirect()->route('changewspasswordview')
        ->with('success','Password Changed Successfully');
       


    }

}
