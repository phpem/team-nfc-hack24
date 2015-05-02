@extends('layouts.main')

@section('content')
    <p>Hey {{ $user['first_name'] }} {{$user['last_name']}}, You are about to give the rating: {{ $rating }}</p>

    <div class="button button--action">Hell yeah, do it</div>
@endsection
