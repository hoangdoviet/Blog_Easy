@forelse ($post->comments as $comment)
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ $comment->user->name }} {{ __('view.comments') }}

            <span class="pull-right">{{ $comment->created_at->diffForHumans() }}</span>
        </div>

        <div class="panel-body">
            <p>{{ $comment->body }}</p>
        </div>
    </div>
@empty
    <div class="panel panel-default">
        <div class="panel-heading">{{ __('error.NotFound') }}</div>

        <div class="panel-body">
            <p>{{ __('error.NoCommentFound') }}</p>
        </div>
    </div>
@endforelse
