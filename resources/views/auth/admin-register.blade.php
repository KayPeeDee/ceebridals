@extends('layouts.auth-login-register')

@section('content')
    <div class="login-box card">
        <div class="card-body">
            <form class="form-horizontal form-material" id="loginform" method="post" action="{{ route('admin_register') }}">
                @csrf
                <h3 class="text-center m-b-20">Sign Up</h3>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" type="text" placeholder="Username" name="username" value="{{ old('username') }}" required autofocus>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email"  placeholder="Email" name="email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" required="" placeholder="Password" name="password">

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" id="password-confirm" type="password"  placeholder="Confirm Password" name="password_confirmation" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">I agree to all <a href="javascript:void(0)">Terms</a></label>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center p-b-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="submit">Sign Up</button>
                    </div>
                </div>
                <div class="form-group m-b-0">
                    <div class="col-sm-12 text-center">
                        Already have an account? <a href="{{route('admin_login_form')}}" class="text-info m-l-5"><b>Sign In</b></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
