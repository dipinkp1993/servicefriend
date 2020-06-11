@extends('userlayout')

    @section('content')
    <div class="row">
    <div class="col-lg-8">
                      <section class="card">
                      @if ($message = Session::get('success'))
    <br>
    <br>
        <div class="alert alert-success">
            <h3>{{ $message }}</h3>
        </div>
    @endif
                          <header class="card-header">
                              Request Service
                          </header>
                          <div class="card-body">
                              <form method="post" action="{{ route('createservicerequest') }}">
                              @csrf
                              <div class="form-group">
                                      <label class="">Service Center </label>
                                      <select class="form-control  js-example-basic-single" name="serviceid">
>
                                          <option value="" selected>Select a Service center</option>
                                      @foreach ($centers as $center)
                                          <option value="{{ $center->sid}}">{{ $center->centername}}</option>
                                          @endforeach
                                         
                                         
                                      </select>
                                      
                                @error('serviceid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                  </div>
                                  <div class="form-group">
                                      <label class="">Category </label>
                                      <select class="form-control" name="catname">
                                      <option value="" selected>Select a category</option>
                                          <option value="two wheeler">Two Wheeler</option>
                                          <option value="three wheeler">Three Wheeler</option>
                                          <option value="four wheeler">Four Wheeler</option>
                                          
                                         
                                         
                                      </select>
                                      @error('catname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                      @enderror
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputEmail1">Vechicle Brand</label>
                                      <input type="text" name="vbrand" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Brand" value="{{ old('vbrand') }}" required autocomplete="vbrand" autofocus>
                                      <small id="emailHelp" class="form-text text-muted">Example(Honda,Maruti etc..)</small>
                                      @error('vbrand')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                      @enderror
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputEmail1">Vechicle Name</label>
                                      <input type="text" name="vname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" value="{{ old('vname') }}" required autocomplete="vname" autofocus>
                                      <small id="emailHelp" class="form-text text-muted">Example(Yamaha Fz)</small>
                                      @error('vname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                      @enderror
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputEmail1">Vechicle Model</label>
                                      <input type="text" name="vmodel" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Model" value="{{ old('vmodel') }}" required autocomplete="vname" autofocus>
                                      <small id="emailHelp" class="form-text text-muted">Example(160cc,2015)</small>
                                      @error('vmodel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                      @enderror
                                  </div>
                                 
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Prefered Servce Date</label>
                                      <input type="date" name="sdate" class="form-control" id="exampleInputPassword1" value="{{ old('sdate') }}" min="<?php echo date('Y-m-d');?>" required autocomplete="sdate" autofocus>
                                  </div>
                                  @error('sdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                      @enderror
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Prefered Servce Time</label>
                                      <input type="time" name="stime" class="form-control" id="exampleInputPassword1" value="{{ old('stime') }}" required autocomplete="stime" autofocus>
                                      @error('stime')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                      @enderror
                                  </div>
                                  
                                  <button type="submit" class="btn btn-primary">Submit</button>
                              </form>

                          </div>
                      </section>
                  </div>
              </div>
              
              <!-- page end-->
   
    @endsection