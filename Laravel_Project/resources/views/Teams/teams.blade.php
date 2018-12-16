@extends('layouts.app')
      @section('content')
<div class='container'>
  <table class='table'>
    <thead class="thead-dark">
        <tr>
            <th scope="col"> Name</th>
            <th scope="col"> Flag</th>
        </tr>
    </thead>
    <tbody>
       @foreach($countries as $countrie)
       <tr>
          <td> {{$countrie->pays}} </td>
          <td> <img src='{{$countrie->flag}}' width="50px" height="30px"> </td>
      </tr>
      @endforeach
  </tbody>
</table>
      <p></p>
      <button type="button" class="btn btn-primary" onclick="window.location='{{ url("teams/createteam") }}'">Add new team</button>
      <button class= 'btn btn-primary' name='back' onclick="window.location='{{ url("Teams/rank") }}'">View Rank</button>
  </div>
  @endsection
