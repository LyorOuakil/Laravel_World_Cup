

@extends('layouts.app')

@section('content')
<div class='container'>
  <table class='table'>
    <thead class="thead-dark">
        <tr>
            <th scope="col"> First Name</th>
            <th scope="col"> Last Name</th>
            <th scope="col"> Position </th>
            <th scope="col"> Country </th>
        </tr>
    </thead>
    <tbody>
       @foreach($players as $player)
       <tr>
          <td> <a href="{{ URL::to('Players/showsingleplayer/' . $player->id)}}">{{$player->first_name}} </a></td>
      <td> <a href="{{ URL::to('Players/showsingleplayer/' . $player->id)}}">{{$player->last_name}} </a></td>
          <td> {{$player->position}} </td>
          <td> {{$player->pays}} </td>

      </tr>
      @endforeach
  </tbody>
</table>

<button type="button" class="btn btn-primary" onclick="window.location='{{ url("players/createplayer") }}'">Add new player</button>
<button class= 'btn btn-primary' name='back' onclick="window.location='{{ url("Teams/rank") }}'">View Rank</button>
</div>
@endsection
