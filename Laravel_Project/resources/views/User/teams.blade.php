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
       <td> <a href="{{ URL::to('players/' . $countrie->id)}}" > {{$countrie->pays}} </a> </td>
          <td> <img src='{{$countrie->flag}}' width="50px" height="30px"> </td>
      </tr>
      @endforeach
  </tbody>
</table>
<p></p>
<button type="button" class="btn btn-primary" onclick="window.location='{{ url("home") }}'">Go Back</button>
</div>
  @endsection