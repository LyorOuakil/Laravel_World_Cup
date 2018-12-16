@extends('layouts.app')

@section('content')

<div class="container">
    <table class="table">
        <thead>
            <tr>
             <th>Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Delete</th>
            </tr>
        </thead>
        <tbody>

    @foreach ($users as $users)
            <tr>
    <td><a href="{{ URL::to('admin/ListUsers/edit/' . $users->id)}}">{{$users->name}}</a></td>
    <td>{{$users->email}}</td>
    <td>{{$users->status}}</td>

    <td><a href="{{ URL::to('admin/ListUsers/' . $users->id)}}">Delete</a></td>
        </tr>
    @endforeach
        </tbody>
    </table>
</div>

<div class="container">
      <button type="button" class="btn btn-primary" onclick="window.location='{{ url("teams/createUser") }}'">Add new User</button>
  </div>

</div>

  @endsection



