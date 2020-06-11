@extends('auth.wholesalerlayout')

    @section('content')
    <div class="row">
    <div class="col-lg-8">
<section class="card">
    @if ($message = Session::get('success'))
    <br>
    <br>
        <div class="alert alert-success">
            <h6>{{ $message }}</h6>
        </div>
    @endif
    @if ($message = Session::get('danger'))
    <br>
    <br>
        <div class="alert alert-danger">
            <h6>{{ $message }}</h6>
        </div>
    @endif
                          <header class="card-header">
                              Change Password
                          </header>
                          <div class="card-body">
                              <form method="post" action="{{ route('changewspa') }}">
                              @csrf
                        
                            
                                  <div class="form-group">
                                      <label for="exampleInputEmail1">Enter Current Password</label>
                                      <input type="text" name="cp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Current Password" value="{{ old('vbrand') }}" required autocomplete="vbrand" autofocus>
                                     
                                    
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputEmail1">Enter New Password</label>
                                      <input type="text" name="np" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="New Password" value="{{ old('vname') }}" required autocomplete="vname" autofocus>
                                     
                                     
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputEmail1">Retype New Password</label>
                                      <input type="text" name="rnp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Retype New Password" value="{{ old('vmodel') }}" required autocomplete="vname" autofocus>
                                   
                                      
                                  </div>
                                 
                                  
                                  
                                  <button type="submit" class="btn btn-primary">Change Password</button>
                              </form>

                          </div>
                      </section>
                  </div>
              </div>
              
              <!-- page end-->
   
    @endsection