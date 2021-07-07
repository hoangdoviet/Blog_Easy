@extends('layouts.app')

@section('content')
    <div id="app" class="container">
        <post-index></post-index>
    </div>

@endsection
    @if (Auth::check())
        <script>window.authUser={!! json_encode(Auth::user()); !!};</script>
    @else
        <script>window.authUser=null;</script>
    @endif
