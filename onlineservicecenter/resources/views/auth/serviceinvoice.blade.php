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
                                  @foreach($userdetails as $userdetail)
                                  <p>
                                     
                                      {{$userdetail->name}} 
                                      <br>
                                      {{$userdetail->address}}
                                      <br>
                                      {{$userdetail->email}}
                                      <br>
                                     
                                  </p>
                                  @endforeach
                                 
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
                             
                              <div class="col-lg-4 col-sm-4">
                                  <h4>INVOICE INFO</h4>
                                  <ul class="unstyled">
                                      <li>Invoice Number		: <strong>69626</strong></li>
                                      <li>Invoice Date		: 2013-03-17</li>
                                      <li>Due Date			: 2013-03-20</li>
                                      <li>Invoice Status		: Paid</li>
                                  </ul>
                              </div>
                          </div>
                          <table class="table table-striped table-hover">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Item</th>
                                  <th class="hidden-phone">Description</th>
                                  <th class="">Unit Cost</th>
                                  <th class="">Quantity</th>
                                  <th>Total</th>
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                                  <td>1</td>
                                  <td>LCD Monitor</td>
                                  <td class="hidden-phone">20 inch Philips LCD Black color monitor</td>
                                  <td class="">$ 1000</td>
                                  <td class="">2</td>
                                  <td>$ 2000</td>
                              </tr>
                              <tr>
                                  <td>2</td>
                                  <td>Laptop</td>
                                  <td class="hidden-phone">Apple Mac book pro 15” Retina Display. 2.8 GHz Processor,8 GB Ram</td>
                                  <td class="">$1750</td>
                                  <td class="">1</td>
                                  <td>$1750</td>
                              </tr>
                              <tr>
                                  <td>3</td>
                                  <td>Mouse</td>
                                  <td class="hidden-phone">Apple Magic Mouse</td>
                                  <td class="">$90</td>
                                  <td class="">3</td>
                                  <td>$270</td>
                              </tr>
                              <tr>
                                  <td>4</td>
                                  <td>Personal Computer</td>
                                  <td class="hidden-phone">iMac 21 inch slim body. 1.7 GHz, 8 GB Ram</td>
                                  <td class="">$1200</td>
                                  <td class="">2</td>
                                  <td>$2400</td>
                              </tr>
                              <tr>
                                  <td>5</td>
                                  <td>Printer</td>
                                  <td class="hidden-phone">Epson Color Jet printer </td>
                                  <td class="">$200</td>
                                  <td class="">2</td>
                                  <td>$400</td>
                              </tr>
                              </tbody>
                          </table>
                          <div class="row justify-content-end">
                              <div class="col-lg-4 invoice-block ">
                                  <ul class="unstyled amounts">
                                      <li><strong>Sub - Total amount :</strong> $6820</li>
                                      <li><strong>Discount :</strong> 10%</li>
                                      <li><strong>VAT :</strong> -----</li>
                                      <li><strong>Grand Total :</strong> $6138</li>
                                  </ul>
                              </div>
                          </div>
                          <div class="text-center invoice-btn">
                              <a class="btn btn-danger text-light"><i class="fa fa-check"></i> Submit Invoice </a>
                              <a class="btn btn-info text-light" onclick="javascript:window.print();"><i class="fa fa-print"></i> Print </a>
                          </div>
                      </div>
                  </div>
              </section>
    @endsection