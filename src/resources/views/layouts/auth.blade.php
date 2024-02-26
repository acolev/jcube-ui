@extends('ui::layouts.master')

@section('body')
    <div class="auth-page-wrapper py-5 d-flex justify-content-center align-items-center min-vh-100">
        <div class="auth-page-content overflow-hidden p-0">
            <div class="auth-page-content">
                <div class="container">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
@endsection
