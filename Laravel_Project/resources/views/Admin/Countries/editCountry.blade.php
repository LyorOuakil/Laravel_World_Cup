@extends('layouts.app')

@section('content')
<div class="container" style="text-align: center">
  <button type="button" class="btn btn-primary" onclick="window.location='{{ url("admin/teams/createteam") }}'">Add new team</button>
  <button class= 'btn btn-primary' name='back' onclick="window.location='{{ url("admin/players") }}'">View Players</button>
  <button class= 'btn btn-primary' name='back' onclick="window.location='{{ url("admin/ListUsers") }}'">View Users</button>
  <button class= 'btn btn-primary' name='back' onclick="window.location='{{ url("Match/match") }}'">View Matchs</button>
  <button class= 'btn btn-primary' name='back' onclick="window.location='{{ url("Teams/rank") }}'">View Rank</button>
<p></p>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    @foreach ($country as $country)
                    <form method="POST" action="{{ route('updateCountry', $country->id) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="pays" class="col-md-4 col-form-label text-md-right">Name of the Team</label>
                            <div class="col-md-6">
                                <input id="pays" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="pays" value="{{$country->pays}}" required autofocus>
                                <div class="form-group">
                                    <a href="http://flagpedia.net/" target="_blank">Go to Flagpedia</a>
                                    <input type="text" name="flag" class="form-control" value=" {{$country->flag}}">
                                    <label for="pays" class="col-md-4 col-form-label text-md-right">Cote</label>
                                    <div class="col-md-6">
                                        <input id="cote" type="text" class="form-control{{ $errors->has('cote') ? ' is-invalid' : '' }}" name="cote" value="{{$country->cote}}" required autofocus>
                                    </div>
                                    @endforeach
                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                    <p></p>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Users') }}
                                            </button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endsection
