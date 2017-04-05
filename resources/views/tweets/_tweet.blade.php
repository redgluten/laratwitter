<div class="media well">
    <div class="media-left">
        <a href="{{ url('users/' . $tweet->user_id) }}">
            <!-- Photo de profil -->
            <img src="{{ $tweet->user->picture }}" alt="Photo de {{ $tweet->user->name }}" class="media-object" style="max-width: 80px;">
        </a>
    </div>
    <div class="media-body">
        <h5 class="media-heading"><a href="{{ url('users/' . $tweet->user_id) }}">{{ '@' . $tweet->user->name }}</a><small class="pull-right text-muted">{{ $tweet->created_at->diffForHumans() }}</small></h5>
        {{ $tweet->content }}
    </div>
</div>
