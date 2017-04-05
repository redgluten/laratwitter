@extends('layouts.public')

@section('title')
Mettre à jour mon profil ({{ $user->email }})
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1>@yield('title')</h1>

                <hr>

                <form action="{{ url('users/' . $user->id) }}" method="POST">

                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    @include('partials._form-errors')

                    <div class="form-group{{ $errors->has('picture') ? ' has-error' : '' }}">
                        <label for="picture">Votre photo de profil</label>
                        <input type="text" class="form-control" placeholder="http://quelquechose.com" name="picture" value="{{ $user->picture }}">
                        @if (empty($user->picture))
                            <p class="help-block">Ajouter une photo</p>
                        @else
                            <p class="help-block">Changer la photo</p>
                            <img src="{{ $user->picture }}" class="img-responsive" alt="Photo de {{ $user->email }}">
                        @endunless
                        <small class="text-danger">{{ $errors->first('picture') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('presentation') ? ' has-error' : '' }}">
                        <label for="presentation">Votre bio</label>
                        <textarea class="form-control" rows="3" name="presentation">{{ $user->presentation }}</textarea>
                        <small class="text-danger">{{ $errors->first('presentation') }}</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
@stop
