@extends('layouts.app')

@section('content')
    <div class='container'>
        <ul class="list-group">
                @foreach ($countries as $country)
                <li class="list-group-item"> <a href="{{ url('players/showsingleteam') }}"> {{ $country->pays }} </a> </li>
                @endforeach
      </ul>
      <p></p>
      <button type="button" class="btn btn-primary" onclick="window.location='{{ url("teams/createteam") }}'">Add new team</button>
      <button class= 'btn btn-primary' name='back' onclick="window.location='{{ url("Teams/rank") }}'">View Rank</button>
  </div>
  @endsection
