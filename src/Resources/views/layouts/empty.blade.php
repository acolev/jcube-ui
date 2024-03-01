@extends('ui::layouts.master')

@section('body')
    @yield('content')
    <x-confirmation-modal/>
    <x-notify/>
@endsection
