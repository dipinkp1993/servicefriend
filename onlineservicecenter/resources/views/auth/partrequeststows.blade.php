@extends('auth.servicelayout')

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
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
                          <header class="card-header">
                              Request Parts
                          </header>
                          <div class="card-body">
                              <form method="post" action="{{ route('cpra') }}">
                              @csrf
                            
                                  <div class="form-group">
                                      <label class="">Parts </label>
                                      <select class="form-control  js-example-basic-single" name="part">
>
                                          <option value="" selected>Select Part</option>
                                      @foreach ($parts as $part)
                                          <option value="{{ $part->pid}}">{{ $part->pname}} / Rs-{{ $part->price}}</option>
                                          @endforeach
                                         
                                         
                                      </select>
                                      
                               
                                  </div>
                                
                                  <div class="form-group">
                                      <label for="exampleInputEmail1">No of Parts</label>
                                      <input type="text" name="noofpart" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Number of Parts Required"   autofocus>
                                     
                                    
                                  </div>
                                 
                                 
                                  
                                  <button type="submit" class="btn btn-primary">Submit</button>
                              </form>

                          </div>
                      </section>
                  </div>
              </div>
              
              <!-- page end-->
   
    @endsection