@if(\View::exists('components.logo.icon'))
    <x-dynamic-component component="logo.icon" {{ $attributes }}/>
@else
    <div class="text-secondary fw-normal fs-1 text-uppercase">LG</div>
@endif
