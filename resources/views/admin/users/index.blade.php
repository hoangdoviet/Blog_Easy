@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                        {{ __('view.Users') }}
                        </h2>
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('view.Name') }}</th>
                                    <th>Email</th>
                                    <th>{{ __('view.Admin') }}?</th>
                                    <th>{{ __('view.NoofPosts') }}</th>
                                    <th>{{ __('view.Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ ($user->is_admin)?'Yes':'No' }}</td>
                                        <td>{{ $user->posts_count }}</td>
                                        <td>
                                            <a href="{{ url("/admin/users/{$user->id}") }}" data-method="DELETE" data-token="{{ csrf_token() }}" data-confirm="{{ __('view.confirm') }}" class="btn btn-xs btn-danger">{{ __('view.Delete') }}</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">{{ __('error.UsersAvai') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {!! $users->links('vendor.pagination.custom') !!}

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
