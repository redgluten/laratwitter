@extends('layouts.public')

@section('title')
Pages
@stop

@section('content')
<div class="container">

    <div class="row">
        <div class="col-sm-12">
            <a href="{{ url('pages/create') }}" class="btn btn-success pull-right">Nouvelle page</a>
        </div>

        <hr>

        {{-- Pages table --}}
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Date de création</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pages as $page)
                            <tr>
                                <td>
                                    <a href="{{ url('pages/' . $page->id) }}">{{ $page->title }}</a>
                                </td>
                                <td>
                                    {{ $page->created_at->format('d/m/Y') }}
                                </td>
                                <td>
                                    <a href="{{ url('pages/' . $page->id . '/edit') }}" class="btn btn-info">Modifier</a>
                                </td>
                                <td>
                                    <form action="{{ url('pages/' . $page->id) }}" method="POST" role="form">

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

            {{ $pages->links() }}
        </div>
    </div>

</div>
@stop
