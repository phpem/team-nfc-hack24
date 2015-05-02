@extends('layouts.main')

@section('meta-title')
    Forgotten Password | Team NFC
@endsection

@section('page-title')
    Password Reset
@endsection

@section('content')
    <div class="row">
        <div class="small-12 medium-8 large-6 columns medium-push-2 large-push-3">
            <div class="panel panel--login">
                <div class="panel__body">
					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
					@endif

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

					<form class="form form--forgotten" role="form" method="POST" action="{{ url('/password/email') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<label class="form__label">E-Mail Address</label>
                        <input type="email" class="form__field" name="email" value="{{ old('email') }}" placeholder="me@email.com">

                        <button type="submit" class="button button--success button--submit">
                            Reset Password
                        </button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
