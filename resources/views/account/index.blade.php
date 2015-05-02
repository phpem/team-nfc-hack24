@extends('layouts.main')

@section('meta-title')
    Account | Team NFC
@endsection

@section('page-title')
    Account
@endsection

@section('content')
    <div class="row">
        <div class="small-12 medium-8 large-6 columns medium-push-2 large-push-3">
            <div class="panel panel--login">
                <div class="panel__body">

                    <div class="action-list">
                        <a class="action-list__item" href="{{ URL::to('/profile') }}"><span><i class="fa fa-user"></i></span> My profile</a>
                        <a class="action-list__item" href="{{ URL::to('/dashboard') }}"><span><i class="fa fa-tachometer"></i></span> Dashboard</a>
                        <a class="action-list__item" href="{{ URL::to('/account/teams') }}"><span><i class="fa fa-users"></i></span> Teams</a>
                        <a class="action-list__item" href="{{ URL::to('/auth/logout') }}"><span><i class="fa fa-sign-out"></i></span> Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
