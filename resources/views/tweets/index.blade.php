@extends('layouts.public')

@section('title')
Tweets
@stop

@section('content')
<div class="container">

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Utilisateur</th>
                    <th>Contenu</th>
                    <th>Date de création</th>
                    <th>Modifier</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tweets as $tweet)
                    <tr>
                        <td>{{ $tweet->user->name }}</td>
                        <td>{{ $tweet->content }}</td>
                        <td>{{ $tweet->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ url('tweets/' . $tweet->id . '/edit') }}" class="btn btn-info">Modifier</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $tweets->links() }}

</div>
@stop
