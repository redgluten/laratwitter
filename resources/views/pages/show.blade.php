@extends('layouts.public')

@section('title')
{{ $page->title }}
@stop

@section('content')
    <div class="container">
        <div class="row">

            <h1>{{ $page->title }}</h1>

            <div class="col-md-6 col-md-offset-3">
                {{ $page->content }}
            </div>
        </div>
    </div>
@stop
