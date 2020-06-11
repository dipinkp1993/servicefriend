@extends('auth.wholesalerlayout')

    @section('content')
    <div class="row">
                <div class="col-sm-12">
              <section class="card">
              <header class="card-header">
                View Parts
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
    @if ($message = Session::get('warning'))
        <div class="alert alert-warning">
            <p>{{ $message }}</p>
        </div>
    @endif
              <div class="adv-table">
              <table  class="display table table-bordered table-striped" id="dynamic-table">
              <thead>
                                        <tr>
                                            <th>Part Serial Number</th>
                                            <th>Part Name</th>
                                            <th>Stock</th>
                                        
                                            
                                            <th>Actions</th>
                                            
                                           
                                        </tr>
                                    </thead>

                                    <tbody>
                                       @foreach($requests as $part)
                                        <tr>
                                            <td>{{ $part->pslno}}</td>
                                            <td>{{ $part->pname}}</td>
                                            <td>{{ $part->stock_quantity}}</td>
                                            <td><a href="#" data-toggle="modal" data-target="#myModal{{ $part->stockid}}">Click Here</a>
                                            <div class="modal" id="myModal{{ $part->stockid }}">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Stock</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form class="form-horizontal form-border" method="post" action="{{ route('updatestock') }}">
                                   
                                    
                                   
                                     <input type="hidden" name="stoid" value="{{ $part->stockid }}">
                                   @csrf
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Part Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" disabled name="pname" value="{{ $part->pname }}"  class="form-control">
                                         <span class="text-danger"></span>
                                        </div>
                                       
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Part Serial Number</label>
                                        <div class="col-sm-6">
                                            <input type="text" disabled  name="pnumber" class="form-control" required  value="{{ $part->pslno }}" >
                                        
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Stock Quantity</label>
                                        <div class="col-sm-6">
                                            <input type="text"   name="sq" class="form-control" required  value="{{ $part->stock_quantity }}" >
                                        
                                        </div>

                                    </div>
                
                                     <div class="form-group">
                                        <label class="col-sm-3 control-label"></label>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-primary">Update stock</button>
                                        </div>
                                    </div>
                                   <?php
                               
                                   ?> 
                                </form>


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