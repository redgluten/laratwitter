@extends('layouts.public')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Connexion</div>
                <div class="panel-body">
                    @include('auth._login-form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
