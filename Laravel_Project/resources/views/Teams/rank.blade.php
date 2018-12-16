

@extends('layouts.app')
@section('content')
<div class='container'>
  <table class='table'>
    <thead class="thead-dark">
        <tr>
        <th scope="col">Rank</th>
            <th scope="col"> Name</th>
            <th scope="col"> Flag</th>
            <th scope="col"> Wins</th>
            
        </tr>
    </thead>
    <tbody>
    @php ($i = 1)
     @foreach($countries as $countrie)
     <tr>
     <td>{{$i++}}</td>
        <td> <a href="{{ URL::to('players/' . $countrie->id)}}" > {{$countrie->pays}} </a> </td>
      <td> <img src='{{$countrie->flag}}' width="50px" height="30px"> </td>
      <td>{{$countrie->wins}}</td>
  </tr>
  @endforeach
</tbody>
</table>
<p></p>

</div>
@endsection

