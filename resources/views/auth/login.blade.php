@extends('layouts.app')

@section('content')
<body class="login-page sidebar-collapse">
    <!-- Navbar -->
    @include('partials.navbarlogin')
    <!-- End Navbar -->
    <div class="page-header" filter-color="orange">
        <div class="page-header-image" style="background-image:url(../assets/images/convento.jpg)"></div>
        <div class="container">
            <div class="col-md-4 content-center">
                <div class="card card-login card-plain">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="header header-primary text-center">
                            <div class="logo-container">
                                <img src="{{ asset('/assets/images/logo-white.png') }}" alt="Imperium">
                            </div>
                        </div>
						
						<!-- This needs to be fixed -->  
						@if ($errors->has('email'))
						<div class="form-group has-danger">
							<span  id="error" type="error"  class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="error" >
							<span class="invalid-feedback">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
						</div>
                        @endif

                        <div class="content">
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons users_circle-08"></i>
                                </span>
                                <input id="email" type="email" placeholder="{{ __('E-Mail Address') }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                
                                           
                            </div>
										
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons text_caps-small"></i>
                                </span>
                                <input id="password" type="password" placeholder="{{ __('Password') }}" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required />
                            
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-group form-group-no-border input-lg">
                                <div class="checkbox">
                                    <input type="checkbox" id="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="checkbox">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="footer text-center">
                            <button type="submit" id="login" class="btn btn-primary btn-round btn-lg btn-block">
                                {{ __('Login') }}
                            </button>
                        </div>

                        <div class="footer text-center">
                            <a href="{{ url('login/facebook') }}" class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>
                            <a href="{{ url('login/google') }}" class="btn btn-social-icon btn-google-plus"><i class="fa fa-google-plus"></i> Google</a>
                        </div>
                        
                        <div class="pull-left">
                            <h6>
                                <a href="{{ route('register') }}" class="link">{{ __('Create Account') }}</a>
                            </h6>
                        </div>
                        <div class="pull-right">
                            <h6>
                                <a href="{{ route('password.request') }}" class="link">{{ __('Forgot Your Password?') }}</a>
                            </h6>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @include('partials.footer')
    </div>
</body>
@endsection