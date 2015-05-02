@extends('layouts.main')

@section('meta-title')
    Login | Team NFC
@endsection

@section('page-title')
    Login
@endsection

@section('content')
<div class="row">
    <div class="small-12 medium-8 large-6 columns medium-push-2 large-push-3">
        <div class="panel panel--login">
            <div class="panel__body">
                @if (count($errors) > 0)
                    <div class="panel__alerts panel__alerts--danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="login">
                    <form class="form form--login" role="form" method="POST" action="{{ url('/auth/login') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <label class="form__label">E-Mail Address</label>
                        <input type="email" class="form__field" name="email" value="{{ old('email') }}" placeholder="me@email.com">

                        <label class="form__label">Password</label>
                        <input type="password" class="form__field" name="password" placeholder="************">

                        <div class="login__remember form__checkbox">
                            <label class="form__checkbox-label">
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                        </div>

                        <button type="submit" class="button button--success button--submit">Login</button>
                        <a class="form__footer-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
