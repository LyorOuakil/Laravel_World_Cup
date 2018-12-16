@extends('layouts.app')

@section('content')
<div class="container" style="text-align: center">
  <button type="button" class="btn btn-primary" onclick="window.location='{{ url("admin/teams/createteam") }}'">Add new team</button>
  <button class= 'btn btn-primary' name='back' onclick="window.location='{{ url("admin/players") }}'">View Players</button>
  <button class= 'btn btn-primary' name='back' onclick="window.location='{{ url("admin/ListUsers") }}'">View Users</button>
  <button class= 'btn btn-primary' name='back' onclick="window.location='{{ url("Match/match") }}'">View Matchs</button>
  <button class= 'btn btn-primary' name='back' onclick="window.location='{{ url("Teams/rank") }}'">View Rank</button>

</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                            @foreach ($user as $user)
                    <form method="POST" action="{{ route('update', $user->id) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="{{ $user->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="{{$user->email}}" required>
                        <div class="form-group row">
                            <label for="credits" class="col-md-4 col-form-label text-md-right">{{ __('credits') }}</label>
                            <div class="col-md-6">
                                <input id="credit" type="text" class="form-control{{ $errors->has('credits') ? ' is-invalid' : '' }}" name="credits" placeholder="{{ $user->credits }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                                @endforeach
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-check">
                            <input type="checkbox" name="isAdmin" class="form-check-input" id="isAdmin">
                            <label class="form-check-label" for="isAdmin">Is admin</label>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                {{ __('Users') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
