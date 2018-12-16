@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                </div>
            </div>
            <p></p>
            <button class= 'btn btn-primary' name='back' onclick="window.location='{{ url("teams") }}'">View Teams</button>
            <button class= 'btn btn-primary' name='back' onclick="window.location='{{ url("players") }}'">View Players</button>
            <button class= 'btn btn-primary' name='back' onclick="window.location='{{ url("Match/match") }}'">View Matchs</button>
            <button class= 'btn btn-primary' name='back' onclick="window.location='{{ url("Teams/rank") }}'">View Rank</button>
        </div>
        </div>
    </div>
</div>
@endsection
