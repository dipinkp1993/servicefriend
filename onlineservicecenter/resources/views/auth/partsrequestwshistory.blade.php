@extends('auth.wholesalerlayout')

    @section('content')
    <div class="row">
                <div class="col-sm-12">
              <section class="card">
              <header class="card-header">
               Part Request From Service Center
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
                  <th>Service Center</th>
                  <th>Part Number</th>
                  <th>Part Name</th>
                  <th>No of Parts Requested</th>
                  <th>Status</th>
                  <th>Action</th>
                  
                  
                 
              </tr>
              </thead>
              <tbody>
             
     @foreach ($requests as $request)
        <tr class="gradeX">
            
            <td>{{ $request->centername }}</td>
            <td>{{ $request->pslno }}</td>
            <td>{{ $request->pname }}</td>
            <td>{{ $request->numparts }}</td>
            <td>{{ $request->reqstatus }}</td>
            <td>
            @if($request->numparts>$request->stock_quantity)
            <p style="color:red;">Out of Stock</p>
            @else
              @if($request->reqstatus=='pending')
              <a href="#" data-toggle="modal" data-target="#myModal{{ $request->prwid }}">
            Click Here</a>
            <div class="modal" id="myModal{{ $request->prwid }}">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Request From {{ $request->centername }}</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <section class="card">
                          <header class="card-header">
                            <h3> Part Request Details</h3>
                          </header>
                          <div class="card-body">
                          <form method="post" action="{{ route('updatepartrequeststatusws') }}">
             @csrf
             <input type="hidden" name="prwid"  value="{{ $request->prwid }}">
        
        <b>     <input type="hidden" name="scid"  value="{{ $request->sid }}">                        
     <div class="form-group">
        <h6>Service Center : </h6>
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
        <h6>No Of Parts Requested :{{ $request->numparts }}</h6>
         
      
     </div>
     <div class="form-group">
        <br>
     </div>
    
    
    
     @if($request->reqstatus=='pending')
     <div class="form-group">
         <h6>Request Status :
         <select class="form-control input-sm" name="status">
          <option value="{{ $request->reqstatus }}">{{ $request->reqstatus }}</option>
        <option value="approved">Approve And Allot part</option>
        <option value="rejected">Reject</option>
        </select>
        </h6>
     </div>
     
     
     <button type="submit" class="btn btn-primary">Take Action</button>
     @elseif($request->reqstatus=="paid")
<h6 style="color:green"><i class="fa fa-check-circle" aria-hidden="true" ></i> Paid</h6>
@elseif($request->reqstatus=="rejected")
<h6 style="color:red"><i class="fa fa-times" aria-hidden="true" ></i> Rejected</h6>
     @else
     <div class="form-group">
         <h6 style="color:green">Request Status :
         {{ $request->reqstatus }}</h6>
         
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
</div>
              @else
              <h6>Completed</h6>
              @endif
            
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