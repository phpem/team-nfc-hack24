@extends('layouts.main')

@section('meta-title')
    Team {{ $team->team_name }} | Team NFC
@endsection

@section('page-title')
    {{ $team->team_name }}<span class="welcome__title-sub">{{ $organisation->org_name }}</span>
@endsection

@section('content')
    <div class="row">
        <div class="small-12 medium-8 large-6 columns medium-push-2 large-push-3">
            <div class="panel panel--login">
                <div class="panel__body">
                    <div class="panel__lead-user">
                        <a href="{{ URL::to('/profile/' . $manager->id) }}"><img class="panel__lead-user-avatar" src="{{ $manager->avatar }}" alt="{{ $manager->first_name }} {{ $manager->last_name }}" />{{ $manager->first_name }} {{ $manager->last_name }}</a>
                    </div>
                    <div class="user-list">
                        @forelse($users as $member)
                            <a class="action-list__item" href="{{ URL::to('/profile/' . $member->id) }}">{{ $member->first_name }} {{ $member->last_name }}</a>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
