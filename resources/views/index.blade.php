@extends('layouts.public')

@section('title')
Accueil
@stop

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <h1>Dernier tweets</h1>

                @foreach($tweets as $tweet)
                    <div class="media well">
                        <a class="media-left" href="#">
                            <!-- Photo de profil -->
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">@??<small class="pull-right text-muted">{{ $tweet->created_at->diffForHumans() }}</small></h4>
                            {{ $tweet->content }}
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="col-md-4 col-md-offset-2">
                <h3>Sidebar</h3>

                @if (auth()->guest())
                    <div class="panel panel-default">
                        <div class="panel-heading">Déjà membre&#xA0;? Connectez-vous&#xA0;:</div>

                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
