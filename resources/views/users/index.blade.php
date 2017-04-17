@extends('layouts.public')

@section('title')
Utilisateurs
@stop

@section('content')
<div class="container">

    <div class="row">
        <div class="col-sm-12">
            <a href="{{ url('users/create') }}" class="btn btn-success pull-right">Nouvel utilisateur</a>
        </div>

        <hr>

        {{-- Utilisateurs table --}}
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Date de création</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    <a href="{{ url('users/' . $user->id) }}">{{ $user->name }}</a>
                                </td>
                                <td>
                                    <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                </td>
                                <td>
                                    {{ $user->created_at->format('d/m/Y') }}
                                </td>
                                <td>
                                    <a href="{{ url('users/' . $user->id . '/edit') }}" class="btn btn-info">Modifier</a>
                                </td>
                                <td>
                                    <form action="{{ url('users/' . $user->id) }}" method="POST" role="form">

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

            {{ $users->links() }}
        </div>
    </div>

</div>
@stop
