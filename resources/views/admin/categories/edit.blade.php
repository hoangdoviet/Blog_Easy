@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                        {{ __('view.Edit') }} {{ __('view.Categories') }}

                            <a href="{{ url('admin/categories') }}" class="btn btn-default pull-right">{{ __('view.GoBack') }}</a>
                        </h2>
                    </div>

                    <div class="panel-body">
                         <form class="form-horizontal" role="form" method="POST" action="{{ url("/admin/categories/{$category->id}") }}">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                          {!! Form::model($category, ['method' => 'PUT', 'url' => "/admin/categories/{$category->id}", 'class' => 'form-horizontal', 'role' => 'form']) !!}

                            @include('admin.categories.form');

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-2">
                                    <button type="submit" class="btn btn-primary">
                                    {{ __('view.Update') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                          {!! Form::close() !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
