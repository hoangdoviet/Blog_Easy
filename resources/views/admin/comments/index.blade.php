@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                        {{ __('view.Comments') }}


                        </h2>
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('view.Posts') }}</th>
                                    <th>{{ __('view.Comments') }}</th>
                                    <th>{{ __('view.Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($comments as $comment)
                                    <tr>
                                        <td>{{ ($comment->post)?$comment->post->title:""  }}</td>
                                        <td>{{ $comment->body }}</td>
                                        <td>
                                            <a href="{{ url("/admin/comments/{$comment->id}") }}" data-method="DELETE" data-token="{{ csrf_token() }}" data-confirm="{{ __('view.confirm') }}" class="btn btn-xs btn-danger">{{ __('view.Delete') }}</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">{{ __('view.NoCommentAvai') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {!! $comments->links('vendor.pagination.custom') !!}

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
