@extends('auth.servicelayout')

    @section('content')
    <section>
                  <div class="card card-primary">
                      <!--<div class="card-heading navyblue"> INVOICE</div>-->
                      <div class="card-body">
                          <div class="row invoice-list">
                              <div class="col-md-12 text-center corporate-id">
                                  <h3>SERVICEFRIEND</h3>
                              </div>
                              <div class="col-lg-4 col-sm-4">
                                  <h4>BILLING ADDRESS</h4>
                                  <p>Serviceadmin</p>
                                  
                                  <p>Service Friend</p>
                                 
                                 
                              </div>
                              <div class="col-lg-4 col-sm-4">
                                  <h4>SHIPPING ADDRESS</h4>
                                  @foreach($requests as $request)
                                  <p>{{$request->centername}}
                                  <br>
                                  {{$request->address}}
                                      <br>
                                      {{$request->email}}
                                      <br>
                                    
                                  </p>
                                  @endforeach
                              </div>
                             
                          </div>
                          <table class="table table-striped table-hover">
                              <thead>
                             
                              <tr>
                                
                                  
                                  <th class="hidden-phone">Item</th>
                                  <th class="">Unit Cost</th>
                                  <th class="">Quantity</th>
                                  <th>Total</th>
                              </tr>
                              </thead>
                              <tbody>
                             
                              <tr>
                                 
                                  
                                  <td class="hidden-phone">{{ $request->pname}}</td>
                                  <td class=""><i class="fa fa-inr" aria-hidden="true"></i>
                                   {{ $request->price}}</td>
                                  <td class="">{{ $request->numparts}}</td>
                                  <td><i class="fa fa-inr" aria-hidden="true"></i>
                                  {{$request->numparts * $request->price }}</td>
                              </tr>
                             
                              </tbody>
                          </table>
                          <div class="row justify-content-end">
                              
                          </div>
                          <div class="text-center invoice-btn">
                             
                              <a class="btn btn-info text-light" onclick="javascript:window.print();"><i class="fa fa-print"></i> Print </a>
                          </div>
                      </div>
                  </div>
              </section>
    @endsection