@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                @forelse ($posts as $post)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{ $post->title }} - <small>by {{ $post->user->name }}</small>

                            <span class="pull-right">
                                @forelse ($post->tags as $tag)
                                    <span class="label label-default">{{ $tag->name }}</span>
                                @empty
                                    <span class="label label-danger">No tag found.</span>
                                @endforelse
                            </span>
                        </div>

                        <div class="panel-body">
                            <p>{{ Illuminate\Support\Str::limit($post->body, 200) }}</p>
                            <p>
                                <span class="btn btn-sm btn-success">{{ $post->category->name }}</span>
                                <span class="btn btn-sm btn-info">{{ $post->comments_count }} comments</span>

                                <a href="{{ url("/posts/{$post->id}") }}" class="btn btn-sm btn-primary">See more</a>
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="panel panel-default">
                        <div class="panel-heading">Not Found!!</div>

                        <div class="panel-body">
                            <p>Sorry! No post found.</p>
                        </div>
                    </div>
                @endforelse

                <div align="center">
                    {!! $posts->links() !!}
                </div>

            </div>

        </dev>
    </dev>
@endsection
