@extends('layouts.public')

@section('title')
Voir le tweet
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                @include('tweets._tweet')
            </div>
        </div>
    </div>
@stop
