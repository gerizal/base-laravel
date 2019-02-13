@extends('layouts.app')

@section('body-class', 'hold-transition login-page')

@section('wrapper')

<div class="login-box" style="width: 560px;">
  <div class="login-logo">
    <a href="/">Clean <b>&</b> Clear</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Forgot Password</p>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">
                    Send Password Reset Link
                </button>
            </div>
        </div> 

        <div class="form-group">
            <div class="col-xs-6 col-md-offset-4">
              <a href="{{ route('login') }}" class="btn btn-primary btn-block btn-flat">Back to Login</a><br>
            </div>
        </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection
