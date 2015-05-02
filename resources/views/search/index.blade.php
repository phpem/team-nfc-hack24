@extends('layouts.main')

@section('meta-title')
    Search | Team NFC
@endsection

@section('content')
    <div class="row">
        <div class="small-12 columns">
            <form class="form form--special" role="form" method="POST" action="{{ url('/auth/register') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <label for="search">Search</label>
                <input type="text" id="search" value="" placeholder="Search here..." name="search" />

            </form>
        </div>
    </div>
@endsection
