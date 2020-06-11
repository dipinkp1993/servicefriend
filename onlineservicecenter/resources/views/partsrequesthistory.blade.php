@extends('userlayout')

    @section('content')
    <div class="row">
                <div class="col-sm-12">
              <section class="card">
              <header class="card-header">
                Your Parts Requests
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
                  <th>Part Name</th>
                  <th>Number of parts</th>
                  <th>Request Status</th>
                 
                 
              </tr>
              </thead>
              <tbody>
             
     @foreach ($requests as $request)
        <tr class="gradeX">
            
            <td>{{ ucfirst($request->centername) }}</td>
            
            <td>{{ $request->pname }}</td>
            <td>{{ $request->noofparts }}</td>
            <td>@if($request->request_status=='approved')
         <strong style="color:green"> {{ $request->request_status }}  </strong>/ 
           
            <a href="" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#myModal{{ $request->cprid }}">Pay Amount</a>
            <div class="modal" id="myModal{{ $request->cprid }}">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">View Payment Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <section class="card">
                          <header class="card-header">
                            <h3> Part Request Details</h3>
                          </header>
                          <div class="card-body">
                          <form method="post" action="{{ route('paypart') }}">
             @csrf
             <input type="hidden" name="cprid"  value="{{ $request->cprid }}">
             <input type="hidden" name="amount"  value="{{ $request->price }}">
             <input type="hidden" name="cprid"  value="{{ $request->cprid }}">
             <input type="hidden" name="sid"  value="{{ $request->sid }}">
             <input type="hidden" name="np"  value="{{ $request->noofparts }}">
        
        <b>                            
     <div class="form-group">
        <h6>Service center : </h6>
         <h6>{{ $request->centername }}</h6>
       
         
     </div>
     <div class="form-group">
        <br>
     </div>
     <div class="form-group">
     <h6>Part Serial Number : 
      {{ $request->pslno }}</h6>
         
        
     </div>
     <div class="form-group">
        <br>
     </div>
     <div class="form-group">
        <h6> Part Name : 
        {{ $request->pname }}<h6>
         
     </div>
     <div class="form-group">
        <br>
     </div>
    
     <div class="form-group">
        <h6>No Of Parts Requested :{{ $request->noofparts }}</h6>
         
      
     </div>
     <div class="form-group">
         <h6 style="color:violet">Price :
         Rs {{ $request->price }}</h6>
         
      
     </div>
     <div class="form-group">
     <button type="submit" class="btn btn-primary">Pay Now</button>
     </div>
    
    
    
    
 </form>
 <hr/>
 </b>


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
@elseif($request->request_status=="paid")
<h6 style="color:green"><i class="fa fa-check-circle" aria-hidden="true" ></i> Paid | 
<a href="{{ url('home/partbill',$request->cprid) }}">View Bill</a></h6>
@elseif($request->request_status=="pending")
<h6 style="color:blue"><i class="fa fa-clock-o" aria-hidden="true" ></i> Pending
@else
<h6 style="color:red"><i class="fa fa-times" aria-hidden="true" ></i>{{ $request->request_status }}
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