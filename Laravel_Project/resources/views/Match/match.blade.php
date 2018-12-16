@extends('layouts.app')

@section('content')
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>
<body>
  <p></p>
  <div class="container">
    <ul class="list-group">
      <li class="list-group-item" style=" text-align: center">Matchs</li>
    </ul>

@foreach($matchs as $match)
    <table class="table table-striped" style=" text-align: center">
      <thead class="thead">
        <tr>
          <th scope="col" style="width: 20%">{{$match->team_1}}</th>
          <th scope="col" style="width: 20%">{{$match->team_2}}</th>
          <th scope="col" style="width: 20%">State</th>
          <th scope='col' style="width: 35%" >Weather</th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <td scope="row" style=" text-align: center">{{$match->score_1}}</td>
          <td scope="row" style=" text-align: center">{{$match->score_2}}</td>
          <td scope="row" style=" text-align: center">{{$match->state}}</td>
          <td scope="row" style="text-align: right">{{$match->weather}}</td>
        </tr>
      </tbody>
    </table>
    <p></p>
      @endforeach
    <button type="button" class="btn btn-primary" onclick="window.location='{{ url("Match/creatematch") }}'">Add new match</button>




  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
@endsection
</html>
