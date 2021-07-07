@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $post->title }} - <small>{{ __('view.by') }} {{ $post->user->name }}</small>

                        <span class="pull-right">
                            {{ $post->created_at->toDayDateTimeString() }}
                        </span>
                    </div>

                    <div class="panel-body">
                        <p>{{ $post->body }}</p>
                        <p>
                        {{ __('view.Categories') }}: <span class="label label-success">{{ $post->category->name }}</span> <br>
                        {{ __('view.Tags') }}:
                            @forelse ($post->tags as $tag)
                                <span class="label label-default">{{ $tag->name }}</span>
                            @empty
                                <span class="label label-danger">{{ __('error.NoTagFound') }}</span>
                            @endforelse
                        </p>
                    </div>
                </div>
                @if (Auth::user())
                    <post-comment :post="{{ json_encode($post) }}"> </post-comment>
                @endif


                @include('frontend._comment')

            </div>

        </dev>
    </dev>
@endsection
