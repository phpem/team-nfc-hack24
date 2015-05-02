@extends('layouts.main')

@section('meta-title')
    Welcome! Team NFC
@endsection

@section('content')
    <h1 class="welcome__title">Team NFC</h1>
    <div class="row">
        <div class="welcome__signup welcome__signup--upper clearfix">
            <div class="small-12 medium-5 large-3 columns medium-push-1 large-push-3">
                <div class="button button--action">Register</div>
            </div>
            <div class="small-12 medium-5 large-3 columns medium-pull-1 large-pull-3">
                <div class="button button--success">Login</div>
            </div>
        </div>
    </div>
    <div class="row" data-equalizer>
        <div class="small-12 medium-12 large-4 columns">
            <div class="welcome__panel" data-equalizer-watch>
                <h1 class="welcome__panel-title">Vote <i class="fa fa-check"></i></h1>

                <p class="welcome__panel-copy">Cupidatat reprehenderit do est aute. Consectetur aliqua ipsum incididunt
                    aute amet aliquip eu ipsum reprehenderit. Proident ut minim minim labore laboris laborum esse
                    excepteur incididunt enim irure voluptate.</p>
            </div>
        </div>
        <div class="small-12 medium-12 large-4 columns">
            <div class="welcome__panel" data-equalizer-watch>
                <h1 class="welcome__panel-title">See <i class="fa fa-search"></i></h1>

                <p class="welcome__panel-copy">Cupidatat reprehenderit do est aute. Consectetur aliqua ipsum incididunt
                    aute amet aliquip eu ipsum reprehenderit. Proident ut minim minim labore laboris laborum esse
                    excepteur incididunt enim irure voluptate.</p>
                <p class="welcome__panel-copy">Cupidatat reprehenderit do est aute. Consectetur aliqua ipsum incididunt
                    aute amet aliquip eu ipsum reprehenderit. Proident ut minim minim labore laboris laborum esse
                    excepteur incididunt enim irure voluptate.</p>
            </div>
        </div>
        <div class="small-12 medium-12 large-4 columns">
            <div class="welcome__panel" data-equalizer-watch>
                <h1 class="welcome__panel-title">Decide <i class="fa fa-thumbs-o-up"></i></h1>

                <p class="welcome__panel-copy">Cupidatat reprehenderit do est aute. Consectetur aliqua ipsum incididunt
                    aute amet aliquip eu ipsum reprehenderit. Proident ut minim minim labore laboris laborum esse
                    excepteur incididunt enim irure voluptate.</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="welcome__signup welcome__signup--lower">
            <div class="small-12 medium-4 large-3 columns medium-push-2 large-push-3">
                <div class="button button--action">Register</div>
            </div>
            <div class="small-12 medium-4 large-3 columns medium-pull-2 large-pull-3">
                <div class="button button--success">Login</div>
            </div>
        </div>
    </div>
@endsection