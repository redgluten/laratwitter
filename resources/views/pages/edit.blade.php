@extends('layouts.public')

@section('title')
Modifier la page {{ $page->title }}
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form action="{{ url('pages/' . $page->id) }}" method="POST" role="form">

                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title">Titre *</label>
                    <input type="text" name="title" id="title" class="form-control" required="required" value="{{ $page->title }}">
                    <small class="text-danger">{{ $errors->first('title') }}</small>
                </div>

                <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                    <label for="content">Contenu *</label>
                    <textarea name="content" id="content" cols="30" rows="5" class="form-control">{{ $page->content }}</textarea>
                    <small class="text-danger">{{ $errors->first('content') }}</small>
                </div>

                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        </div>
    </div>
</div>
@stop
