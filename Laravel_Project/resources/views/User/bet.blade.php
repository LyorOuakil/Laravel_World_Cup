@extends('layouts.app')
@section('content')

<div class="container">
<form method="POST" action="{{ route('Bet', Auth::user()->id )}}">
@csrf
  <div class="form-group">
    <label for="credits">Number of Credits To Bet</label>
    <input type="number" name="credits" class="form-control" id="credits" aria-describedby="credits" min=0 max={{ Auth::user()->credits }} placeholder="Enter Number of Credits">
  </div>

<div class="container" style="text-align: center">
  @foreach($matchs as $match)

  <input type="submit" href="{{ route('Bet', Auth::user()->id )}}"  value="{{$match->team_1}}" role="button"> - <input type="submit" href="{{ route('Bet', Auth::user()->id )}}"  value="{{$match->team_2}}" role="button"><br><br>

    @endforeach 
    <div>
    </div>
    </div>
</form>
</div>

@endsection