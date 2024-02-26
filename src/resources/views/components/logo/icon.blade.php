@if(\View::exists('components.logo.icon'))
    <x-logo.icon/>
@else
    <div class="text-light fw-normal fs-1 text-uppercase">LG</div>
@endif
