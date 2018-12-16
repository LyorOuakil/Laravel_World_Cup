
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <title>Create Team</title>
</head>
<body>

    @extends('layouts.app')

      @section('content')
<div class='container'>
  <table class='table'>
    <thead class="thead-dark">
        <tr>
            <th scope="col"> Name </th>
            <th scope="col"> Number </th>
            <th scope="col"> Post </th>
            <th scope="col"> Goal(s) </th>
            <th scope="col"> Assist(s) </th>
            <th scope="col"> Yellow Card(s) </th>
            <th scope="col"> Red Card(s) </th>
            <th scope='col'> Countries </th>

        </tr>
    </thead>

    <tbody>
       @foreach($stats as $stat)
       <tr>
          <td>{{$stat->first_name}}</td>
          <td> {{$stat->number}} </td>
          <td>{{$stat->post}}</td>
          <td> {{$stat->goal}} </td>
          <td> {{$stat->assist}} </td>
          <td> {{$stat->yellow_card}} </td>
          <td> {{$stat->red_card}} </td>
          <td>{{$stat->pays}} </td>

      </tr>

  </tbody>
</table>

      <p></p>

      <button type="button" class="btn btn-primary" onclick="window.location='{{ URL::to('players/' . $stat->id) }}'">Back to Team</button>
  </div>
  @endforeach
 @endsection

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
