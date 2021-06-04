@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                        {{ __('view.Categories') }}

                            <a href="{{ url('admin/categories/create') }}" class="btn btn-default pull-right">{{ __('view.Create') }}</a>
                        </h2>
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('view.Name') }}</th>
                                    <th>{{ __('view.PostCount') }}</th>
                                    <th>{{ __('view.Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->posts_count }}</td>
                                        <td>
                                            <a href="{{ url("/admin/categories/{$category->id}/edit") }}" class="btn btn-xs btn-info">{{ __('view.Edit') }}</a>
                                            <a href="{{ url("/admin/categories/{$category->id}") }}" data-method="DELETE" data-token="{{ csrf_token() }}" data-confirm="{{ __('view.confirm') }}" class="btn btn-xs btn-danger">{{ __('view.Delete') }}</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">{{ __('view.NoCatAvai') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {!! $categories->links('vendor.pagination.custom') !!}

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
