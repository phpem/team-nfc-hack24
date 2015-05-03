@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Rate your Manager</div>
                    <div class="panel-body">
                        <p>Hey {{ $user['first_name'] }} {{$user['last_name']}}, You are about to give the rating: {{ $rating }}</p>

                        <form class="form form--login" role="form" method="POST" action="{{ url('/vote') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <label class="form__label">Team</label>
                            <select name="team_id" class="form-control">
                                @foreach ($teams as $team)
                                    <option value="{{$team->id}}">{{ $team->team_name }}</option>
                                @endforeach
                            </select>

                            <label class="form__label">Criteria</label>
                            <select name="criteria_id" class="form-control">
                                @foreach ($criteria as $criterion)
                                    <option value="{{$criterion->id}}">{{ $criterion->criterion }}</option>
                                @endforeach
                            </select>

                            <label class="form__label">Manager</label>
                            <select name="manager_id" class="form-control">
                                @foreach ($managers as $manager)
                                    <option value="{{$manager->id}}">{{ $manager->first_name }} {{ $manager->last_name }}</option>
                                @endforeach
                            </select>

                            <label class="form__label">Rating</label>
                            <input id="rating" name="rating" type="text" value="{{ $rating }}" />

                            <button type="submit" class="button button--success button--submit">Hell yeah, do it</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
