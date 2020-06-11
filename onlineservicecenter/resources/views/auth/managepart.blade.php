@extends('auth.wholesalerlayout')

    @section('content')
    <div class="row">
                <div class="col-sm-10">
              <section class="card">
              <header class="card-header">
                Manage Parts
             <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
              </header>
              <div class="card-body">
              <form class="form-horizontal form-border" method="post" action="{{ route('addpart') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Part Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="pname" value=""  class="form-control" required>
                                        
                                        </div>
                                       
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Part Serial Number</label>
                                        <div class="col-sm-6">
                                            <input type="text"  class="form-control"  name="pnumber" value="" required >
                                         
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Part Price</label>
                                        <div class="col-sm-6">
                                            <input type="number"  class="form-control"  name="price" value="" required >
                                         
                                        </div>

                                    </div>
                                     <div class="form-group">
                                        <label class="col-sm-3 control-label"></label>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-primary">Add Part</button>
                                        </div>
                                    </div>
                                    
                                </form>
              </div>
              </section>
              </div>
              </div>
              
              <!-- page end-->
    @endsection