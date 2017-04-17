@extends('layouts.public')

@section('title')
Modifier l’utilisateur {{ $user->name }}
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form action="{{ url('users/' . $user->id) }}" method="POST" role="form">

                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    @include('partials._form-errors')

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">Nom *</label>
                        <input type="name" name="name" id="name" class="form-control" required="required" value="{{ $user->name }}">
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">Email *</label>
                        <input type="email" name="email" id="email" class="form-control" required="required" value="{{ $user->email }}">
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password">Mot de passe *</label>
                        <input type="text" name="password" id="password" class="form-control">
                        <small class="text-danger">{{ $errors->first('password') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label for="password_confirmation">Confirmez le mot de passe *</label>
                        <input type="text" name="password_confirmation" id="password_confirmation" class="form-control">
                        <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                    </div>

                    <hr>

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
