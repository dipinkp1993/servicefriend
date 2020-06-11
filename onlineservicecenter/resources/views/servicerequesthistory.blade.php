@extends('userlayout')

    @section('content')
    <div class="row">
                <div class="col-sm-12">
              <section class="card">
              <header class="card-header">
                Your Service Requests
             <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
              </header>
              <div class="card-body">
              <div class="adv-table">
              <table  class="display table table-bordered table-striped" id="dynamic-table">
              <thead>
              <tr>
                  <th>Service Center</th>
                  <th>Service Date</th>
                  <th>Service Time</th>
                  <th>Vechicle Name</th>
                  <th>Vechicle Brand</th>
                  <th>Status</th>
                 
                 
              </tr>
              </thead>
              <tbody>
             
     @foreach ($requests as $request)
        <tr class="gradeX">
            
            <td>{{ ucfirst($request->centername) }}</td>
            
            <td>{{ date('d-M-Y', strtotime( $request->sdate)) }}</td>
            <td>{{ $request->stime }}</td>
            <td>{{ $request->vname }}</td>
            <td>{{ $request->vbrand }}</td>
            <td>
            @if($request->request_status=='completed')
           Completed / <a href="" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#myModall{{ $request->rid }}">View And Pay </a>
          
            <div class="modal" id="myModall{{ $request->rid }}">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <section class="card">
                          <header class="card-header">
                            <h3> Service Request Details</h3>
                          </header>
                          <div class="card-body">
                          <form method="post">
             @csrf
                               
     <div class="form-group">
         <label for="exampleInputEmail1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Category : </label>
         <input type="text" disabled  name="catname" value="{{ $request->catname }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Brand" value="{{ old('catname') }}" required autocomplete="catname" autofocus>
       
         @error('catname')
       <span class="invalid-feedback" role="alert">
           <strong>{{ $message }}</strong>
       </span>
         @enderror
     </div>
     <div class="form-group">
        <br>
     </div>
     <div class="form-group">
         <br><label for="exampleInputEmail1">Vechicle Brand : </label>
       <input type="text" name="vbrand" disabled value="{{ $request->vbrand }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Brand" value="{{ old('vbrand') }}" required autocomplete="vbrand" autofocus>
         
        
     </div>
     <div class="form-group">
        <br>
     </div>
     <div class="form-group">
         <label for="exampleInputEmail1">Vechicle Name : </label>
         <input type="text" name="vname" value="{{ $request->vname }}" disabled class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" value="{{ old('vname') }}" required autocomplete="vname" autofocus>
         
        
     </div>
     <div class="form-group">
        <br>
     </div>
     <div class="form-group">
         <label for="exampleInputEmail1">Vechicle Model : </label>
         <input type="text" name="vmodel" value="{{ $request->vmodel }}" disabled class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Model"   autofocus>
         
        
     </div>
     <div class="form-group">
        <br>
     </div>
     <div class="form-group">
         <label for="exampleInputPassword1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Service Date : </label>
        <input type="date" name="sdate" value="{{ $request->sdate }}"  class="form-control" id="exampleInputPassword1"  autocomplete="sdate" autofocus>
     </div>
     <div class="form-group">
        <br>
     </div>
    
     <div class="form-group">
         <label for="exampleInputPassword1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Service Time : </label>
          <input type="time" name="stime" value="{{ $request->stime }}"  class="form-control" id="exampleInputPassword1"  autocomplete="stime" autofocus>
         
     </div>
    
     <div class="form-group">
         <label for="exampleInputPassword1">&nbsp;Request Status : </label>
          <input type="text" name="status" value="{{ $request->request_status }}"  class="form-control" disabled>
         
     </div>
     
 </form>
 <hr/>
 
 <form method="post" action="{{ route('payuserservice') }}">
 <input type="hidden" name="rid" value="<?php echo $request->rid;?>">
             @csrf
            
     @foreach ($histories as $sdone)
     @if($request->rid==$sdone->rqid)
     <div class="form-group">
         <label for="exampleInputEmail1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Service Charge : </label>
         <input type="text" disabled  name="scharge" value="{{ $request->service_charge }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Service charge"  required autocomplete="service charge" autofocus>
       
     </div>
     <div class="form-group">
         <label for="exampleInputEmail1">Service Done By: </label>
         <input type="text" disabled   name="sdoneby" value="{{ $sdone->mname }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Mechanic Name"  required autocomplete="service charge" autofocus>
       
     </div>
     <div class="form-group">
         <label for="exampleInputEmail1">Mechanic Remark: </label>
         <input type="text" disabled   value="{{ $sdone->remarks }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Mechanic Name"  required autocomplete="service charge" autofocus>
       
     </div>
     @break
     @endif
    
     @endforeach
     <div class="form-group">
     <button type="submit" class="btn btn-primary">Pay Now</button>
     </div>
    

 </form>

                          </div>
                      </section>
                      
      <div class="card">
      <div class="row">
    <div class="col-lg-8">
     
                              </div>

      </div>
      </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
            @endif
            @if($request->request_status=='paid')
            Paid | <a href="{{url('home/servicebill',$request->rid)}}">View Bill</a>
            @endif
            @if($request->request_status=='pending')
            Pending
            @endif
            @if($request->request_status=='approved')
            Approved
            @endif
            @if($request->request_status=='rejected')
            Rejected
            @endif
            </td>
           

           
        </tr>
        @endforeach
        
              
               </tbody>
              <tfoot>
              
              </tfoot>
              </table>
              </div>
              </div>
              </section>
              </div>
              </div>
              
              <!-- page end-->
   
    @endsection 