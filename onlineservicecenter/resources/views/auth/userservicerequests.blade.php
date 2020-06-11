@extends('auth.servicelayout')

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
              @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
              <div class="adv-table">
              <table  class="display table table-bordered table-striped" id="dynamic-table">
              <thead>
              <tr>
                  <th>Name of Requestee</th>
                  <th>Service Date</th>
                  <th>Service Time</th>
                  <th>Vechicle Name</th>
                  <th>Vechicle Brand</th>
                  <th colspan="2">Status</th>
                  
                  <th>View And Edit</th>
                  
                 
              </tr>
              </thead>
              <tbody>
             
     @foreach ($requests as $request)
        <tr class="gradeX">
            
            <td>{{ ucfirst($request->name) }}</td>
            
            <td>{{ date('d-M-Y', strtotime( $request->sdate)) }}</td>
            <td>{{ $request->stime }}</td>
            <td>{{ $request->vname }}</td>
            <td>{{ $request->vbrand }}</td>
            <td>{{ $request->request_status }}</td>
            <td>
@if($request->request_status=='rejected')
<i class="fa fa-times" style="color:red;" aria-hidden="true"></i>
@elseif($request->request_status=='completed')

<i class="fa fa-check" style="color:green;" aria-hidden="true"></i>
</a>
@elseif($request->request_status=='pending')
<i class="fa fa-clock-o" style="color:blue;" aria-hidden="true"></i>
@endif
 
</td>
            <td><a href="" data-toggle="modal" data-target="#myModal{{ $request->rid }}">Click Here</a>
            <div class="modal" id="myModal{{ $request->rid }}">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Request From {{ $request->name }}</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <section class="card">
                          <header class="card-header">
                            <h3> Service Request Details</h3>
                          </header>
                          <div class="card-body">
                          <form method="post" action="{{ route('updateservicerequeststatus') }}">
             @csrf
             <input type="hidden" name="rid"  value="{{ $request->rid }}">
             <input type="hidden" name="cid"  value="{{ $request->id }}">                        
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
         
         @error('vbrand')
       <span class="invalid-feedback" role="alert">
           <strong>{{ $message }}</strong>
       </span>
         @enderror
     </div>
     <div class="form-group">
        <br>
     </div>
     <div class="form-group">
         <label for="exampleInputEmail1">Vechicle Name : </label>
         <input type="text" name="vname" value="{{ $request->vname }}" disabled class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" value="{{ old('vname') }}" required autocomplete="vname" autofocus>
         
         @error('vname')
       <span class="invalid-feedback" role="alert">
           <strong>{{ $message }}</strong>
       </span>
         @enderror
     </div>
     <div class="form-group">
        <br>
     </div>
     <div class="form-group">
         <label for="exampleInputEmail1">Vechicle Model : </label>
         <input type="text" name="vmodel" value="{{ $request->vmodel }}" disabled class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Model"   autofocus>
         
         @error('vmodel')
       <span class="invalid-feedback" role="alert">
           <strong>{{ $message }}</strong>
       </span>
         @enderror
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
     @if($request->request_status=='pending')
     <div class="form-group">
         <label for="exampleInputPassword1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Request Status : </label>
         <select class="form-control input-sm" name="status">
          <option value="{{ $request->request_status }}">{{ $request->request_status }}</option>
        <option value="approved">approved</option>
        <option value="rejected">rejected</option>
        </select>
     </div>
     
     
     <button type="submit" class="btn btn-primary">Take Action</button>
     @else
     <div class="form-group">
         <label for="exampleInputPassword1">&nbsp;Request Status : </label>
          <input type="text" name="status" value="{{ $request->request_status }}"  class="form-control" disabled>
         
     </div>
     @endif
 </form>
 <hr/>
 
 <form method="post" action="{{ route('completeservicerequest') }}">
             @csrf
             @if($request->request_status=='approved')
             <h3>Service Completion</h3>
             <input type="hidden" name="rid"  value="{{ $request->rid }}">
             <input type="hidden" name="cid"  value="{{ $request->id }}">                        
     <div class="form-group">
         <label for="exampleInputEmail1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Service Charge : </label>
         <input type="text"   name="scharge" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Service charge"  required autocomplete="service charge" autofocus>
       
     </div>
     <div class="form-group">
         <label for="exampleInputEmail1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Service Done By : </label>
         <input type="text"   name="sdoneby" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Mechanic Name"  required autocomplete="service charge" autofocus>
       
     </div>
     <div class="form-group">
         <label for="exampleInputEmail1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mechanic Remarks : </label>
         <input type="text"   name="remarks" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Mechanic Remark"  required autocomplete="Mechanic Remark" autofocus>
       
     </div>
     <button type="submit" class="btn btn-primary">Complete Service</button>
     @elseif($request->request_status=='completed')
     @foreach ($sdones as $sdone)
     @if($sdone->rqid==$request->rid)
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
     @endif
     @endforeach
     @endif

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