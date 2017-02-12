@extends('layouts.public')

@section('title')
Modifier le tweet du {{ $tweet->created_at->format('d/m/Y à H:h') }}
@stop

@section('content')
<div class="container">
    <form action="{{ url('tweets/' . $tweet->id) }}" method="POST" role="form">

        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
            <label for="content">Contenu</label>
            <textarea name="content" id="content" cols="30" rows="5" class="form-control">{{ $tweet->content }}</textarea>
            <small class="text-danger">{{ $errors->first('content') }}</small>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@stop
