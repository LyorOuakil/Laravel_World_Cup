

@extends('layouts.app')

@section('content')
<div class="container">
<h2>List players</h2>
</div>

<div class='container'>
  <table class='table'>
    <thead class="thead-dark">
        <tr>
            <th scope="col"> First Name</th>
            <th scope="col"> Last Name</th>
            <th scope="col"> Position </th>
            <th scope="col"> Country </th>
            <th scope="col"> Edit </th>
            <th scope="col"> Delete </th>
        </tr>
    </thead>
    <tbody>
       @foreach($players as $player)
       <tr>
          <td> <a href="{{ URL::to('Players/showsingleplayer/' . $player->id)}}">{{$player->first_name}} </a></td>
      <td> <a href="{{ URL::to('Players/showsingleplayer/' . $player->id)}}">{{$player->last_name}} </a></td>
          <td> {{$player->position}} </td>
          <td> {{$player->pays}} </td>
          <td><a href="{{ URL::to('admin/players/edit/' . $player->id)}}">Edit</a></td>
          <td><a href="{{ URL::to('admin/players/' . $player->id)}}">Delete</a></td>
      </tr>
      @endforeach
  </tbody>
</table>

<button type="button" class="btn btn-primary" onclick="window.location='{{ url("player/CreatePlayer") }}'">Add new player</button>

</div>
@endsection
