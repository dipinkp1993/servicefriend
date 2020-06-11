@extends('auth.servicelayout')

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
              @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
              <div class="adv-table">
              <table  class="display table table-bordered table-striped" id="dynamic-table">
              <thead>
              <tr>
                  <th>Customer Name</th>
                  <th>Part Name</th>
                  <th>Number of parts</th>
                  <th>Request Status</th>
                  <th>View And Edit</th>
                 
                 
              </tr>
              </thead>
              <tbody>
             
     @foreach ($requests as $request)
        <tr class="gradeX">
            
            <td>{{ ucfirst($request->name) }}</td>
            
            <td>{{ $request->pname }}</td>
            <td>{{ $request->noofparts }}</td>
            <td>
            @if($request->request_status=="paid")
            <h6 style="color:green"><i class="fa fa-check-circle" aria-hidden="true" ></i> Paid</h6>
            @elseif($request->request_status=="approved")
<h6 style="color:green">Approved</h6>
@elseif($request->request_status=="rejected")
<h6 style="color:red"><i class="fa fa-times-circle-o" aria-hidden="true" ></i> Rejected</h6>
@else
<h6 style="color:blue"><i class="fa fa-clock-o"  aria-hidden="true"></i> Pending</h6>

@endif

            
            
           </td>
            <td><a href="" data-toggle="modal" data-target="#myModal{{ $request->cprid }}">Click Here</a>
            <div class="modal" id="myModal{{ $request->cprid }}">
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
                            <h3> Part Request Details</h3>
                          </header>
                          <div class="card-body">
                          <form method="post" action="{{ route('updatepartrequeststatus') }}">
             @csrf
             <input type="hidden" name="cprid"  value="{{ $request->cprid }}">
        
        <b>     <input type="hidden" name="cid"  value="{{ $request->id }}">                        
     <div class="form-group">
        <h6>Name : </h6>
         <h6>{{ $request->name }}</h6>
       
         
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
         <h6>Price :
         Rs {{ $request->price }}</h6>
         
      
     </div>
     <div class="form-group">
        <h6>No Of Parts Requested :{{ $request->noofparts }}</h6>
         
      
     </div>
     <div class="form-group">
        <br>
     </div>
    
    
    
     @if($request->request_status=='pending')
     <div class="form-group">
         <h6>Request Status :
         <select class="form-control input-sm" name="status">
          <option value="{{ $request->request_status }}">{{ $request->request_status }}</option>
        <option value="approved">approved</option>
        <option value="rejected">rejected</option>
        </select>
        </h6>
     </div>
     
     
     <button type="submit" class="btn btn-primary">Take Action</button>
     @elseif($request->request_status=="paid")
<h6 style="color:green"><i class="fa fa-check-circle" aria-hidden="true" ></i> Paid</h6>
@elseif($request->request_status=="rejected")
<h6 style="color:red"><i class="fa fa-times" aria-hidden="true" ></i> Rejected</h6>
     @else
     <div class="form-group">
         <h6 style="color:green">Request Status :
         {{ $request->request_status }}</h6>
         
     </div>
     @endif
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
</div></td>
            
           
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