@extends('layouts.authentication')

@section('auth-body')
    <div class="card">
        <div class="body">
            <form id="sign_in" method="POST" action="{{ route('login') }}">

                @csrf

                <div class="msg">Sign in to start your session</div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                    <div class="form-line">
                        <input placeholder="E-Mali Address" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif

                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                    <div class="form-line">
                        <input placeholder="Password" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-8 p-t-5">

                        <input class="form-check-input filled-in chk-col-pink" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>

                    </div>
                    <div class="col-xs-4">

                        <button type="submit" class="btn btn-block bg-pink waves-effect">
                            {{ __('Login') }}
                        </button>

                    </div>
                </div>
                <div class="row m-t-15 m-b--20">
                    <div class="col-xs-6">
                        <a class="hide" href="sign-up.html">Register Now!</a>
                    </div>
                    <div class="col-xs-6 align-right">

                        <a  href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>

                    </div>
                </div>
            </form>
        </div>
    </div>
@stop