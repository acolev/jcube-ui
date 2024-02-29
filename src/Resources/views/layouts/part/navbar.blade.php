<nav class="navbar navbar-expand-lg navbar-landing fixed-top" id="navbar">
    <div class="container">
        <a class="navbar-brand" href="#">
{{--            <x-svg.logo height="30" style="color: var(--bs-dark)"/>--}}
        </a>
        <button class="navbar-toggler py-0 fs-20 text-body" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <i class="mdi mdi-menu"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mt-2 mt-lg-0" id="navbar-example">
                <li class="nav-item">
                    <a class="nav-link fs-15 fw-semibold" href="#home">{{__('Home')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-15 fw-semibold" href="#about">{{__('About')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-15 fw-semibold" href="#features">{{__('Features')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-15 fw-semibold" href="#pricing">{{__('Pricing')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-15 fw-semibold" href="#faq">{{__('FAQ')}}</a>
                </li>
            </ul>

            <div class="">
                @include('ui::layouts.part.user')
            </div>
        </div>
    </div>
</nav>
