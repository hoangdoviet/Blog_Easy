@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                        {{ __('view.Tags') }}

                            <a href="{{ url('admin/tags/create') }}" class="btn btn-default pull-right">{{ __('view.Create') }}</a>
                        </h2>
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('view.Name') }}</th>
                                    <th>{{ __('view.Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tags as $tag)
                                    <tr>
                                        <td>{{ $tag->name }}</td>
                                        <td>
                                            <a href="{{ url("/admin/tags/{$tag->id}/edit") }}" class="btn btn-xs btn-info">{{ __('view.Edit') }}</a>
                                            <a href="{{ url("/admin/tags/{$tag->id}") }}" data-method="DELETE" data-token="{{ csrf_token() }}" data-confirm="{{ __('view.confirm') }}" class="btn btn-xs btn-danger">{{ __('view.Delete') }}</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">{{ __('error.TagsAvai') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {!! $tags->links('vendor.pagination.custom') !!}

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
