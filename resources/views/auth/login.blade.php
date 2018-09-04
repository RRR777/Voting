@extends('layouts.logged_out')

@section('content')

    <div class="login-box">
        <div class="login-logo">
            @if ($whatPeriodIs == "nomination")
                <b>Nomination </b>Platform
            @elseif ($whatPeriodIs == "voting")
                <b>Voting </b>Platform
            @elseif ($whatPeriodIs == "before nomination" || $whatPeriodIs == "after voting")
                <b>Nomination and Voting</b> Platform
            @endif
        </div>

        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg"> 
                @if ($whatPeriodIs == "nomination")
                    <b>Login and nominate</b>
                @elseif ($whatPeriodIs == "voting")
                    <b>Login and vote</b>
                @elseif ($whatPeriodIs == "before nomination")
                    <b>Nomination will start on {{ $getPeriodDates->nomination_start_date->format('Y F d') }}</b>
                @elseif ($whatPeriodIs == "after voting")
                    <b>Voting allready ended on {{ $getPeriodDates->voting_end_date->format('Y F d') }}</b>
                @endif
            </p>

            <form method="post" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif

                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <a href="{{ url('/password/reset') }}">I forgot my password</a><br>
            <a href="{{ url('/register') }}" class="text-center">Register a new membership</a>

            <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="{{ route('login.facebook') }}" class="btn btn-block btn-social btn-facebook btn-flat">
                    <i class="fa fa-facebook"></i> Sign in using Facebook</a>
    {{--             <a href="#" class="btn btn-block btn-social btn-google btn-flat">
                    <i class="fa fa-google-plus"></i> Sign in using Google+</a> --}}
        </div>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->


@endsection
