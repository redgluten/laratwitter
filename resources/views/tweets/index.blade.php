@extends('layouts.public')

@section('title')
Tweets
@stop

@section('content')
<div class="container">

    <a href="{{ url('tweets/create') }}" class="btn btn-success">Nouveau tweet</a>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Utilisateur</th>
                    <th>Contenu</th>
                    <th>Date de création</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tweets as $tweet)
                    <tr>
                        <td>
                            <a href="{{ url('users/' . $tweet->user_id) }}">{{ $tweet->user->name }}</a>
                        </td>
                        <td>
                            <a href="{{ url('tweets/' . $tweet->id) }}">{{ $tweet->content }}</a>
                        </td>
                        <td>{{ $tweet->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ url('tweets/' . $tweet->id . '/edit') }}" class="btn btn-info">Modifier</a>
                        </td>
                        <td>
                            <form action="{{ url('tweets/' . $tweet->id) }}" method="POST" role="form">

                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $tweets->links() }}

</div>
@stop
