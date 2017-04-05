<form role="form" method="POST" action="{{ url('/login') }}">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="control-label">Adresse e-mail</label>

        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="control-label">Mot de passe</label>

        <input id="password" type="password" class="form-control" name="password" required>

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="remember"> Se souvenir de moi
            </label>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">
            Connexion
        </button>

        <a class="btn btn-link" href="{{ url('/password/reset') }}">
            Mot de passe oublié ?
        </a>
    </div>
</form>
