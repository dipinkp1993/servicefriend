<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thevectorlab.net/flatlab-4/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Feb 2020 09:00:54 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dipinkp ">
    <meta name="keyword" content="service center">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>Service center</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('assetswebapp/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('assetswebapp/css/bootstrap-reset.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('assetswebapp/assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{asset('assetswebapp/css/style.css') }}" rel="stylesheet">
    <link href="{{asset('assetswebapp/css/style-responsive.css') }}" rel="stylesheet" />


</head>

  <body class="login-body">

    <div class="container">
    @if ($message = Session::get('success'))
    <br>
    <br>
        <div class="alert alert-success">
            <h3>{{ $message }}</h3>
        </div>
    @endif

    @isset($url)
    <form method="POST" class="form-signin" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
    @else
    <form method="POST" class="form-signin" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
    @endisset
    @csrf
        <h2 class="form-signin-heading">{{ isset($url) ? ucwords($url) : ""}} {{ __('Login') }}</h2>
        <div class="login-wrap">
        Email:
        <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>

        @error('email')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
        <br>
        Password:
        <input id="password" placeholder="{{ __('Password') }}" type="password" class="form-control @error('password') is-invalid @enderror"  value="{{ old('password') }}" name="password"  autocomplete="password" autofocus>
        @error('password')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
         @enderror   
         <label class="checkbox">
                <input type="checkbox"  name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
                <span class="pull-right">
                  

                </span>
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit"> {{ __('Login') }}</button>
           
           
            <div class="registration">
                @isset($url)
                
                @if($url=='servicecenter')
                Don't have an account yet?
                <a class="" href="/register/servicecenter">
                    Create an account
                </a>
                @endif
              
               @else
                Don't have an account yet?
                 <a class="" href="/register">
                    Create an account
               
             @endisset
            </div>

        </div>
      </form>

    </div>



    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{asset('assetswebapp/js/jquery.js')}}"></script>
    <script src="{{asset('assetswebapp/js/bootstrap.bundle.min.js')}}"></script>


  </body>

<!-- Mirrored from thevectorlab.net/flatlab-4/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Feb 2020 09:00:54 GMT -->
</html>
