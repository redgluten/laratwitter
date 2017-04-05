@extends('layouts.public')

@section('title')
{{ $user->name }}
@stop

@section('content')
    <div class="container">
        <div class="row">

            {{-- Infos utilisateur --}}
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <img src="{{ $user->picture }}" class="img-responsive" alt="Photo de {{ $user->email }}">
                        @if ($user->presentation)
                            <p class="text-center">{{ $user->presentation }}</p>
                        @endif
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">Nom : {{ '@' . $user->name }}</li>
                        <li class="list-group-item">Inscrit : {{ $user->created_at->diffForHumans() }}</li>
                        <li class="list-group-item">Tweets : <span class="badge">{{ count($tweets) }}</span></li>
                    </ul>
                </div>
            </div>

            {{-- Timeline --}}
            <div class="col-md-6">
                <h3>Tweets</h3>
                @foreach ($tweets as $tweet)
                    @include('tweets._tweet')
                @endforeach
            </div>
        </div>
    </div>
@stop
