@extends('layouts.main')

@section('meta-title')
    Your Teams | Team NFC
@endsection

@section('page-title')
    Your Teams
@endsection

@section('content')
    <div class="row">
        <div class="small-12 medium-8 large-6 columns medium-push-2 large-push-3">
            <div class="panel panel--login">
                <div class="panel__body">

                    <div class="action-list">
                        @forelse($teams as $team)
                            <a class="action-list__item" href="{{ URL::to('/team/' . $team->id) }}"><span><i class="fa fa-users"></i></span> {{ $team->team_name }}</a>

                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
