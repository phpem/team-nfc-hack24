@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Rate your Manager</div>
                    <div class="panel-body">
                        <p>Hey {{ $user['first_name'] }} {{$user['last_name']}}, You are about to give the rating: {{ $rating }}</p>

                        <form class="form form--login" role="form" method="POST" action="{{ url('/auth/login') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <label class="form__label">Team</label>
                            <select name="team" class="form-control">
                                @foreach ($teams as $team)
                                    <option value="{{$team->id}}">{{ $team->team_name }}</option>
                                @endforeach
                            </select>
                        </form>

                        <div class="button button--action">Hell yeah, do it</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
