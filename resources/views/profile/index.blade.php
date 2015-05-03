@extends('layouts.main')

@section('meta-title')
    {{ $user->first_name }} {{ $user->last_name }} | Team NFC
@endsection

@section('page-avatar')
    <img class="page-avatar page-avatar--circle" src="{{ $user->avatar }}" alt="{{ $user->first_name }} {{ $user->last_name }} profile image" />
@endsection

@section('page-title')
    {{ $user->first_name }} {{ $user->last_name }}
@endsection

@section('content')
    <div class="row">
        <div class="small-12 medium-8 large-6 columns medium-push-2 large-push-3">
            <div class="panel panel--login">
                <div class="panel__body">

                    <div class="action-list">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
