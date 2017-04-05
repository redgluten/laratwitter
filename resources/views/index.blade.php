@extends('layouts.public')

@section('title')
Accueil
@stop

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                @foreach($tweets as $tweet)
                    @include('tweets._tweet')
                @endforeach

            </div>

            <div class="col-md-4 col-md-offset-2">
                @if (auth()->guest())
                    <div class="panel panel-default">
                        <h4 class="panel-heading"><strong>Déjà membre&#xA0;?</strong> Connectez-vous&#xA0;:</h4>

                        <div class="panel-body">
                            @include('auth._login-form')
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <h4 class="panel-heading"><strong>Nouveau sur Twitter ?</strong> Inscrivez-vous&#xA0;:</h4>

                        <div class="panel-body">
                            @include('auth._register-form')
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
