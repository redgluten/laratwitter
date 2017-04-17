@extends('layouts.public')

@section('title')
Liste des pages
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <h1>Index des pages</h1>

                <ul>
                @foreach ($pages as $page)
                    <li>{{ $page->title }}</li>
                @endforeach
                </ul>

            </div>
        </div>
    </div>
@endsection
