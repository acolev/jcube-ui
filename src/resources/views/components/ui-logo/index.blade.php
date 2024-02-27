@if(\View::exists('components.logo.index'))
    <x-dynamic-component component="logo" {{ $attributes }}/>
@else
    <div class="text-secondary fw-normal fs-1 text-uppercase">Logo</div>
@endif
