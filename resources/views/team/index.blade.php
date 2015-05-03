@extends('layouts.main')

@section('meta-title')
    Team {{ $team->team_name }} | Team NFC
@endsection

@section('page-title')
    {{ $team->team_name }}
@endsection

@section('content')
    <div class="row">
        <div class="small-12 medium-8 large-6 columns medium-push-2 large-push-3">
            <div class="panel panel--login">
                <div class="panel__body">

                    <div class="user-list">
                        @forelse($members as $member)
                            <a class="action-list__item" href="{{ URL::to('/profile/' . $member->id) }}">{{ $member->name }}</a>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
