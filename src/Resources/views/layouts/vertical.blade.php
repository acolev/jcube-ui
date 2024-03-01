@extends('ui::layouts.master', [
  'layout' => 'vertical',
])


@section('body')
    <div id="layout-wrapper">
        @include('ui::layouts.part.topbar')
        @include('ui::layouts.part.sidebar')

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <x-confirmation-modal/>
    <x-notify/>
@endsection
