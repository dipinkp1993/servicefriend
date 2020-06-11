<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="sdfdsf">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>Service Center Home</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('assetswebapp/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('assetswebapp/css/bootstrap-reset.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('assetswebapp/assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />

    <!--dynamic table-->
    <link href="{{asset('assetswebapp/assets/advanced-datatable/media/css/demo_page.css') }}" rel="stylesheet" />
    <link href="{{asset('assetswebapp/assets/advanced-datatable/media/css/demo_table.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('assetswebapp/assets/data-tables/DT_bootstrap.css') }}" />
    <!--right slidebar-->
    <link href="{{asset('assetswebapp/css/slidebars.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('assetswebapp/css/style.css') }}" rel="stylesheet">
    <link href="{{asset('assetswebapp/css/style-responsive.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{asset('assetswebapp/assets/jquery-multi-select/css/multi-select.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assetswebapp/assets/select2/css/select2.min.css') }}"/>


  </head>
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
                          <table class="table table-bordered">
                              <thead>
                             
                              <tr>
                                
                                  
                                  <th >Item Name</th>
                                  <td>{{ $request->pname}}</td>
                            </tr>
                            <tr>
                                
                                  
                                  <th >Unit Cost</th>
                                  <td><i class="fa fa-inr" aria-hidden="true"></i> {{ $request->price}}</td>
                            </tr>
                            <tr>
                                
                                  
                                  <th >Quantity</th>
                                  <td>{{ $request->numparts}}</td>
                            </tr>
                            <tr>
                                
                                  
                                <th >Total Price</th>
                                <td><i class="fa fa-inr" aria-hidden="true"></i>{{$request->numparts * $request->price }}</td>
                          </tr>
                                
                          </table> 
                          <div class="row justify-content-end">
                              
                          </div>
                          <div class="text-center invoice-btn">
                             
                              <a class="btn btn-info text-light" onclick="javascript:window.print();"><i class="fa fa-print"></i> Print </a>
                          </div>
                      </div>
                  </div>
              </section>

              <script src="{{asset('assetswebapp/js/jquery.js') }}"></script>
    <script src="{{asset('assetswebapp/js/jquery-ui-1.9.2.custom.min.js') }}"></script>
    <script src="{{asset('assetswebapp/js/bootstrap.bundle.min.js') }}"></script>
    <script class="include" type="text/javascript" src="{{asset('assetswebapp/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{asset('assetswebapp/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{asset('assetswebapp/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <script type="text/javascript" language="javascript" src="{{asset('assetswebapp/assets/advanced-datatable/media/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{asset('assetswebapp/assets/data-tables/DT_bootstrap.js')}}"></script>
    <script src="{{asset('assetswebapp/js/respond.min.js') }}" ></script>

    <!--right slidebar-->
    <script src="{{asset('assetswebapp/js/slidebars.min.js') }}"></script>

    <!--dynamic table initialization -->
    <script src="{{asset('assetswebapp/js/dynamic_table_init.js') }}"></script>


    <!--common script for all pages-->
    <script type="text/javascript" src="{{asset('assetswebapp/assets/select2/js/select2.min.js') }}"></script>
    <script src="{{asset('assetswebapp/js/common-scripts.js') }}"></script>
<script type="text/javascript">

$(document).ready(function () {
    $(".js-example-basic-single").select2();

    $(".js-example-basic-multiple").select2();
});
</script>
  
