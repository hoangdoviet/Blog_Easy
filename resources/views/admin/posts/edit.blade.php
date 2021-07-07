@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                        {{ __('view.Edit') }} {{ __('view.Posts') }}

                            <a href="{{ url('admin/posts') }}" class="btn btn-default pull-right">{{ __('view.GoBack') }}</a>
                        </h2>
                    </div>

                    <div id="app" class="panel-body">
                        <post-edit :post="{{ json_encode($post) }}"></post-edit>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
