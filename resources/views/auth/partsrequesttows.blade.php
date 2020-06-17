@extends('auth.servicelayout')

    @section('content')
    <div class="row">
                <div class="col-sm-12">
              <section class="card">
              <header class="card-header">
               Part Request To wholesaler(Admin)
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
                  <th>Part Number</th>
                  <th>Part Name</th>
                  <th>No of Parts Requested</th>
                  <th>Status</th>
                  
                 
              </tr>
              </thead>
              <tbody>
             
     @foreach ($requests as $request)
        <tr class="gradeX">
            
            
            <td>{{ $request->pslno }}</td>
            <td>{{ $request->pname }}</td>
            <td>{{ $request->numparts }}</td>
            <td>
            @if($request->reqstatus=='approved')
            <strong style="color:green"> {{ $request->reqstatus }} </strong> / 
            <a href="" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#myModal{{ $request->prwid }}">Pay Amount</a>
            <div class="modal" id="myModal{{ $request->prwid }}">
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
                          <form method="post" action="{{ route('paypartws') }}">
             @csrf
             <input type="hidden" name="prwid"  value="{{ $request->prwid }}">
             <input type="hidden" name="amount"  value="{{ $request->price }}">
             <input type="hidden" name="sid"  value="{{ $request->sid }}">
             <input type="hidden" name="np"  value="{{ $request->numparts }}">
             <input type="hidden" name="pid"  value="{{ $request->parid }}">
        
        <b>                            
    
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
        <h6>No Of Parts Requested :{{ $request->numparts }}</h6>
         
      
     </div>
     <div class="form-group">
         <h6>Unit Price :
         Rs {{ $request->price  }}</h6>
         
      
     </div>
     <div class="form-group">
         <h6>Total Price :
         Rs {{ $request->price * $request->numparts  }}</h6>
         
      
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
@elseif($request->reqstatus=="paid")
<h6 style="color:green"><i class="fa fa-check-circle" aria-hidden="true" ></i> Paid | 
<a href="{{ url('servicecenter/partbill',$request->prwid) }}">View Bill</a></h6>
@elseif($request->reqstatus=="pending")
<h6 style="color:blue"><i class="fa fa-clock-o" aria-hidden="true" ></i> Pending
@else
<h6 style="color:red"><i class="fa fa-times" aria-hidden="true" ></i>{{ $request->reqstatus }}
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