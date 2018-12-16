@extends('layouts.app')

@section('content')
<div class="container" style="text-align: center">
      <button type="button" class="btn btn-primary" onclick="window.location='{{ url("admin/teams/createteam") }}'">Add new team</button>
            <button class= 'btn btn-primary' name='back' onclick="window.location='{{ url("admin/players") }}'">View Players</button>
            <button class= 'btn btn-primary' name='back' onclick="window.location='{{ url("admin/ListUsers") }}'">View Users</button>
            <button class= 'btn btn-primary' name='back' onclick="window.location='{{ url("Match/match") }}'">View Matchs</button>
            <button class= 'btn btn-primary' name='back' onclick="window.location='{{ url("Teams/rank") }}'">View Rank</button>
  </div>
  <p></p>
<div class="container">
    <table class="table">
        <thead>
            <tr>
             <th>Teams</th>

            <th scope="col"> Flag</th>
            <th scope="col"> Cote</th>
            <th scope='col'> Edit</th>
            <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>

    @foreach ($countries as $country)
            <tr>
    <td> <a href="{{ URL::to('players/' . $country->id)}}" > {{$country->pays}} </a> </td>

    <td> <img src='{{$country->flag}}' width="50px" height="30px"> </td>
    <td>{{$country->cote}}</td>
    <td><a href="{{ URL::to('admin/countries/edit/' . $country->id)}}">Edit</a></td>
    <td><a href="{{ URL::to('admin/countries/' . $country->id)}}">Delete</a></td>


        </tr>
    @endforeach
        </tbody>
    </table>
</div>


  @endsection
