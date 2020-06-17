@extends('auth.wholesalerlayout')

    @section('content')
    <div class="row">
                <div class="col-sm-10">
              <section class="card">
              <header class="card-header">
                Manage stocks
             <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
              </header>
              <div class="card-body">
              <form class="form-horizontal form-border" method="post" action="{{ route('addstock') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Part Name</label>
                                        <div class="col-sm-6">
                                        <select class="form-control  js-example-basic-single" name="pid">
>
                                          <option value="" selected>Select Part</option>
                                      @foreach ($parts as $part)
                                          <option value="{{ $part->pid}}">{{ $part->pslno}} / Rs-{{ $part->pname}}</option>
                                          @endforeach
                                         
                                         
                                      </select>
                                        
                                        </div>
                                       
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Stock Quantity</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="sq" value=""  class="form-control" required>
                                        
                                        </div>
                                       
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"></label>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-primary">Add Stock</button>
                                        </div>
                                    </div>
                                   
                                    
                                </form>
              </div>
              </section>
              </div>
              </div>
              
              <!-- page end-->
    @endsection