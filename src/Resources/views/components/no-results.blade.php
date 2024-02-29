@props([
    'title' => 'Sorry! No Result Found',
    'text' => 'No Data'
])
<div class="noresult">
    <div class="text-center">
        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json"
                   trigger="loop"
                   colors="primary:#121331,secondary:#08a88a"
                   style="width:75px;height:75px"></lord-icon>
        <h5 class="mt-2">{{ __('Sorry! No Result Found') }}</h5>
        <p class="text-muted mb-0">
            {{ __($text) }}
        </p>
    </div>
</div>
