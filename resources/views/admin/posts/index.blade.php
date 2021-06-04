@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                        {{ __('view.Posts') }}

                            <a href="{{ url('admin/posts/create') }}" class="btn btn-default pull-right">{{ __('view.Create') }}</a>
                        </h2>
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('view.Title') }}</th>
                                    <th>{{ __('view.Body') }}</th>
                                    <th>{{ __('view.Author') }}</th>
                                    <th>{{ __('view.Categories') }}</th>
                                    <th>{{ __('view.Tags') }}</th>
                                    <th>{{ __('view.Published') }}</th>
                                    <th>{{ __('view.Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($posts as $post)
                                    <tr>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ Illuminate\Support\Str::limit($post->body, 60) }}</td>
                                        <td>{{ $post->user->name }}</td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>{{ $post->tags->implode('name', ', ') }}</td>
                                        <td>{{ $post->published }}</td>
                                        <td>
                                            @if (Auth::user()->is_admin)
                                                @php
                                                    if($post->published == 'Yes') {
                                                        $label = Lang::get('view.Draft');
                                                    } else {
                                                        $label = Lang::get('view.Published');
                                                    }
                                                @endphp
                                                <a href="{{ url("/admin/posts/{$post->id}/publish") }}" data-method="PUT" data-token="{{ csrf_token() }}" data-confirm="{{ __('view.confirm') }}" class="btn btn-xs btn-warning">{{ $label }}</a>
                                            @endif
                                            <a href="{{ url("/admin/posts/{$post->id}") }}" class="btn btn-xs btn-success">{{ __('view.Show') }}</a>
                                            <a href="{{ url("/admin/posts/{$post->id}/edit") }}" class="btn btn-xs btn-info">{{ __('view.Edit') }}</a>
                                            <a href="{{ url("/admin/posts/{$post->id}") }}" data-method="DELETE" data-token="{{ csrf_token() }}" data-confirm="{{ __('view.confirm') }}" class="btn btn-xs btn-danger">{{ __('view.Delete') }}</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">{{ __('error.PostsAvai') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {!! $posts->links('vendor.pagination.custom') !!}

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
