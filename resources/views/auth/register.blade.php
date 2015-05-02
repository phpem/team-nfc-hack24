@extends('layouts.main')

@section('meta-title')
    Register | Team NFC
@endsection

@section('page-title')
    Register
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
                    <div class="register">

                        <form class="form form--login" role="form" method="POST" action="{{ url('/auth/register') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <label class="form__label">Name</label>
                            <input type="text" class="form__field" name="first_name" value="{{ old('first_name') }}" placeholder="Bill">

                            <label class="form__label">Last Name</label>
                            <input type="text" class="form__field" name="last_name" value="{{ old('last_name') }}" placeholder="Gates">

                            <label class="form__label">E-Mail Address</label>
                            <input type="email" class="form__field" name="email" value="{{ old('email') }}" placeholder="me@email.com">

                            <label class="form__label">Password</label>
                            <input type="password" class="form__field" name="password" placeholder="************">

                            <label class="form__label">Confirm Password</label>
                            <input type="password" class="form__field" name="password_confirmation" placeholder="************">

                            <button type="submit" class="button button--success button--submit">
                                Register
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
