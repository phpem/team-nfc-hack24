@extends('layouts.main')

@section('meta-title')
    {{ $user->first_name }} {{ $user->last_name }} | Team NFC
@endsection

@section('page-title')
    <img class="page-avatar page-avatar--circle" src="{{ $user->avatar }}" alt="{{ $user->first_name }} {{ $user->last_name }} profile image" /> {{ $user->first_name }} {{ $user->last_name }}
@endsection

@section('content')
    <div class="clearfix" data-evenup data-options='{ "small": 1, "medium": 3, "large": 4 }'>
        <div class="small-12 medium-4 large-3 columns end">
            <div class="panel panel--positive" data-evenup-item>
                <div class="panel__body">
                    <div class="panel__stats">
                        <span class="panel__stats-value">100%</span>
                        <span class="panel__stats-label">of members voted</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="small-12 medium-4 large-3 columns end">
            <div class="panel panel--neutral" data-evenup-item>
                <div class="panel__body">
                    <div class="panel__stats">
                        <span class="panel__stats-value">100%</span>
                        <span class="panel__stats-label">of members voted</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="small-12 medium-4 large-3 columns end">
            <div class="panel panel--negative" data-evenup-item>
                <div class="panel__body">
                    <div class="panel__stats">
                        <span class="panel__stats-value">100%</span>
                        <span class="panel__stats-label">of members voted</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="small-12 medium-4 large-3 columns end">
            <div class="panel panel--borderline" data-evenup-item>
                <div class="panel__body">
                    <div class="panel__stats">
                        <span class="panel__stats-value">100%</span>
                        <span class="panel__stats-label">of members voted</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
