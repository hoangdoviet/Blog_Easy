@extends('layouts.app')

@section('content')
    <div class="container">

        @include('frontend._search')

        <div class="row">

            <div class="col-md-12">
                @forelse ($posts as $post)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{ $post->title }} - <small>{{ __('view.by') }} {{ $post->user->name }}</small>

                            <span class="pull-right">
                                {{ $post->created_at->toDayDateTimeString() }}
                            </span>
                        </div>

                        <div class="panel-body">
                            <p>{{ \Illuminate\Support\Str::limit($post->body, 200) }}</p>
                            <p>
                                Tags:
                                @forelse ($post->tags as $tag)
                                    <span class="label label-default">{{ $tag->name }}</span>
                                @empty
                                    <span class="label label-danger">{{ __('error.NoTagFound') }}</span>
                                @endforelse
                            </p>
                            <p>
                                <span class="btn btn-sm btn-success">{{ $post->category->name }}</span>
                                <span class="btn btn-sm btn-info">{{ __('view.Comments') }} <span class="badge">{{ $post->comments_count }}</span></span>

                                <a href="{{ url("/posts/{$post->id}") }}" class="btn btn-sm btn-primary">{{ __('view.see') }}</a>
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ __('error.NotFound') }}</div>

                        <div class="panel-body">
                            <p>{{ __('error.NoPostFound') }}</p>
                        </div>
                    </div>
                @endforelse


                    {!! $posts->appends(['search' => request()->get('search')]) ->  links()   !!}


            </div>

        </dev>
    </dev>
@endsection
