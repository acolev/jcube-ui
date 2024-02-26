@extends('ui::layouts.empty')

@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-8">
            <div class="text-center">
                <img src="https://themesbrand.com/velzon/html/default/assets/images/error400-cover.png" alt="error img"
                     class="img-fluid">
                <div class="mt-3">
                    <h3 class="text-uppercase">{{__('Sorry, Page not Found')}} 😭</h3>
                    <p class="text-muted mb-4">{{__('The page you are looking for not available')}}!</p>
                    @if(Route::has('home'))
                        <a href="{{ route('home') }}" class="btn btn-success"><i
                                class="mdi mdi-home me-1"></i>{{__('Back to home')}}</a>
                    @endif
                </div>
            </div>
        </div><!-- end col -->
    </div>
@endsection
