@extends('layouts.app')

@section('body-class', 'skin-blue sidebar-mini wysihtml5-supported')

@section('styles')
    @include('layouts.admin.styles')
@endsection

@section('wrapper')
    @include('layouts.admin.header')
    @include('layouts.admin.sidebar')
    <div class="content-wrapper">
        @yield('content')
    </div>
    @include('layouts.admin.footer')
@endsection