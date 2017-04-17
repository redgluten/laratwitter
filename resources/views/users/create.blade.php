@extends('layouts.public')

@section('title')
Créer un nouvel utilisateur
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form action="{{ url('users') }}" method="POST">

                    {{ csrf_field() }}

                    @include('partials._form-errors')

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">Nom *</label>
                        <input type="name" name="name" id="name" class="form-control" required="required">
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">Email *</label>
                        <input type="email" name="email" id="email" class="form-control" required="required">
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password">Mot de passe *</label>
                        <input type="password" name="password" id="password" class="form-control" required="required">
                        <small class="text-danger">{{ $errors->first('password') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label for="password_confirmation">Confirmez le mot de passe *</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required="required">
                        <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
@stop
