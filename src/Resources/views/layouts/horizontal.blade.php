@extends('ui::layouts.master', [
  'layout' => 'horizontal',
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
@endsection