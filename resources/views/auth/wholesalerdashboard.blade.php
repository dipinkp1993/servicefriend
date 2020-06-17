@extends('auth.wholesalerlayout')

    @section('content')
     <div class="row state-overview">
                 
                  <div class="col-lg-4 col-sm-6">
                      <section class="card">
                          <div class="symbol red">
                              
                              <i class="fa fa-tags"></i>
                          </div>
                          <div class="value">
                              <h1 class=" count3">
                                  <a href="wholesaler/partrequests">{{$prequestsws}}</a>
                              </h1>
                              <p>Parts Requests To Wholesaler</p>
                          </div>
                      </section>
                  </div>
                   <div class="col-lg-4 col-sm-6">
                      <section class="card">
                          <div class="symbol yellow">
                              <i class="fa fa-shopping-cart"></i>
                          </div>
                          <div class="value">
                              <h1 class=" count3">
                                  <a href="/wholesaler/viewparts">{{$prequestsws}}</a>
                              </h1>
                              <p>Total Spare Parts</p>
                          </div>
                      </section>
                  </div>
                
              </div>
    <div class="row">
                <div class="col-sm-12">
              <section class="card">
              <header class="card-header">
               
             <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
              </header>
              <div class="card-body">
              <div class="adv-table">
              
              </div>
              </div>
              </section>
              </div>
              </div>
              
              <!-- page end-->
    @endsection