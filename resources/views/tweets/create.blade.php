@extends('layouts.public')

@section('title')
Publier un nouveau tweet
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form action="{{ url('tweets') }}" method="POST">

                    {{ csrf_field() }}

                    @include('partials._form-errors')

                    <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                        <label for="content">Votre tweet</label>
                        <textarea name="content" id="content" cols="30" rows="5" class="form-control"></textarea>
                        <small class="text-danger">{{ $errors->first('content') }}</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
@stop
