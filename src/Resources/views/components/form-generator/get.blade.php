@props([
    "value" => []
])

@foreach ($value as $input)
<div class="mb-3">
    <x-input
        :type="$input->type"
        :name="$input->label"
        :label="$input->name"
        :required="$input->is_required"
    />
</div>
@endforeach
