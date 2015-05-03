@extends('layouts.main')

@section('meta-title')
    Rate | Team NFC
@endsection

@section('page-title')
    Rate
@endsection

@section('content')
    <div class="row">
        <div class="small-12 medium-8 large-6 columns medium-push-2 large-push-3">
            <div class="panel panel--login">
                <div class="panel__body">
                    <p>Hey {{ $user['first_name'] }} {{$user['last_name']}}, please give your feedback below</p>

                    <form class="form form--login" role="form" method="POST" action="{{ url('/vote') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <label class="form__label">Criteria</label>
                        <select name="criteria_id" class="form-control">
                            @foreach ($criteria as $criterion)
                                <option value="{{$criterion->id}}">{{ $criterion->criterion }}</option>
                            @endforeach
                        </select>

                        <label class="form__label">Team</label>
                        <select id="team_id" name="team_id" class="form-control">
                            @foreach ($teams as $team)
                                <option value="{{$team->id}}">{{ $team->team_name }}</option>
                            @endforeach
                        </select>

                        <label class="form__label">Manager</label>
                        <select id="manager_id" name="manager_id" class="form-control">
                            @foreach ($managers as $manager)
                                <option value="{{$manager->id}}">{{ $manager->first_name }} {{ $manager->last_name }}</option>
                            @endforeach
                        </select>

                        <label class="form__label">Rating</label>
                        <ul class="rating-stars">
                            @for ($i = 0; $i < 5; $i++)
                                <li class="rating-star
                                    @if($rating > $i)
                                        active
                                    @endif
                                "><i class="fa fa-star"></i></li>
                            @endfor
                        </ul>
                        <input id="star-rating" name="rating" type="text" value="{{ $rating }}" />

                        <button type="submit" class="button button--success button--submit">Hell yeah, do it</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
