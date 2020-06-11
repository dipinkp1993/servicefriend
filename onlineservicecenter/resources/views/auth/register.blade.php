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

  <body>

<div class="container">
    <br>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card login-wrap">
                <div class="card-header"><h2 class="form-signin-heading"><strong>- {{ __('Register') }} User -</strong></h2></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('userregister') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="addr" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <textarea id="addr" name="addr" class="form-control @error('addr') is-invalid @enderror"   autocomplete="addr" autofocus>{{ old('addr') }}</textarea>

                                @error('addr')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- js placed at the end of the document so the pages load faster -->
<script src="{{asset('assetswebapp/js/jquery.js')}}"></script>
    <script src="{{asset('assetswebapp/js/bootstrap.bundle.min.js')}}"></script>


  </body>

<!-- Mirrored from thevectorlab.net/flatlab-4/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Feb 2020 09:00:54 GMT -->
</html>

