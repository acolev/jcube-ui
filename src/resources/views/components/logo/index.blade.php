@if(\View::exists('components.logo.index'))
    <x-logo/>
@else
    <div class="text-light fw-normal fs-1 text-uppercase">Logo</div>
@endif
