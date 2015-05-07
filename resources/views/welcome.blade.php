@extends('layouts.main')

@section('meta-title')
    Welcome! Team NFC
@endsection

@section('page-title')
    Team NFC
@endsection

@section('content')
    <div class="row">
        <div class="welcome__signup welcome__signup--upper clearfix">
            <div class="small-12 medium-5 large-3 columns medium-push-1 large-push-3">
                <a class="button button--action" href="{{ URL::to('/auth/register') }}">Register</a>
            </div>
            <div class="small-12 medium-5 large-3 columns medium-pull-1 large-pull-3">
                <a class="button button--success" href="{{ URL::to('/auth/login') }}">Login</a>
            </div>
        </div>
    </div>
    <div class="row" data-equalizer>
        <div class="small-12 medium-12 large-4 columns">
            <div class="panel" data-equalizer-watch>
                <h1 class="panel__title">Rate them<i class="fa fa-check"></i></h1>

                <p class="panel__copy">Vote for your managers and team leaders based on a number of criteria. We use an aggregate of collaborative mindshare to score leaders based on your votes in omni-channel criteria.</p>
            </div>
        </div>
        <div class="small-12 medium-12 large-4 columns">
            <div class="panel" data-equalizer-watch>
                <h1 class="panel__title">See <i class="fa fa-search"></i></h1>

                <p class="panel__copy">Using our matrix of integrated users and synergistic data, you can see the statistics on managers as part of their online presence.</p>
            </div>
        </div>
        <div class="small-12 medium-12 large-4 columns">
            <div class="panel" data-equalizer-watch>
                <h1 class="panel__title">Decide <i class="fa fa-thumbs-o-up"></i></h1>

                <p class="pane__copy">Using our hyperpersonal system, you can make organic decisions on how to grow synergistic platforms and decide on your next career move.</p>
                <p class="panel__copy">Are they worth it? Find out!</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="welcome__signup welcome__signup--lower">
            <div class="small-12 medium-4 large-3 columns medium-push-2 large-push-3">
                <a class="button button--action" href="{{ URL::to('/auth/register') }}">Register</a>
            </div>
            <div class="small-12 medium-4 large-3 columns medium-pull-2 large-pull-3">
                <a class="button button--success" href="{{ URL::to('/auth/login') }}">Login</a>
            </div>
        </div>
    </div>
@endsection