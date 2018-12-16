

@extends('layouts.app')

@section('content')



  <title>Create Team</title>
</head>
<body>

  <div class='container'>
  {!! Form::open(['action' => 'CountriesController@createTeam', 'method' => 'POST']) !!}
   <div class="form-group">
    {{Form::label('name', 'Name')}}
    {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'name'])}}
   </div>
   <div class="form-group">
    <a href="http://flagpedia.net/" target="_blank">Go to Flagpedia</a>
    {{Form::text('flag', '', ['class' => 'form-control', 'placeholder' => 'Add url .png'])}}
   </div>
   <div class="form-group">
    {{Form::label('cote', 'Cote')}}
    {{Form::text('cote', '', ['class' => 'form-control', 'placeholder' => 'Cote'])}}
   </div>
   {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}
  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
@endsection
