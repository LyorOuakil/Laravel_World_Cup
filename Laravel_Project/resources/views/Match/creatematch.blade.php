<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <title>Create Match</title>
</head>
<body>
  @extends('layouts.app')

  @section('content')

    <div class="container">
     {!! Form::open(array('action' => 'MatchController@createMatch', 'method' => 'POST')) !!}
     <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text">Teams</span>
      </div>
      {{Form::text('team_1', '', ['class' => 'form-control', 'placeholder' => 'First Team'])}}
      {{Form::text('team_2', '', ['class' => 'form-control', 'placeholder' => 'Second Team'])}}
    </div>
    <p></p>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text">Goal(s)</span>
      </div>
      {{Form::text('score_1', '', ['class' => 'form-control', 'placeholder' => 'Goal(s)'])}}

      {{Form::text('score_2', '', ['class' => 'form-control', 'placeholder' => 'Goals(s)'])}}

    </div>
<p></p>
Winners :
{{Form::select('winner', array('team_1' => 'First Team', 'team_2' => 'Second Team ', 'draw' => 'draw'))}}
State : {{Form::select('state', array('finish' => 'Finish', 'upcoming' => 'Upcoming'))}}
‘{{Form::text('weather', '', ['class' => 'form-control', 'placeholder' => 'Weather'])}}
<p></p>
<a href="{{ URL::previous()}}"><button type="button" class="btn btn-primary">Back</button></a>

  <p></p>
  {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
  {!! Form::close() !!}


</div>



@endsection





<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
