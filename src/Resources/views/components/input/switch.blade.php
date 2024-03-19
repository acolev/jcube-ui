@props([
	"name" => '',
	"value" => '',
	"label" => "",
	"placeholder" => "",
	"required" => false,
	"checked" => false,
	"variants" => [],
	"id" => null,
])

<div class="form-check form-switch">
  <input class="form-check-input"
         type="radio"
         role="switch"
         name="{{ $name }}"
         value="{{ $value }}" id="{{ $id }}"
      @required(!!$required)
      @checked(!!$checked)
      {{ $attributes }}>
  @isset($label)
    <label for="{{ $id }}" class="@required(!!$required)">{!! __($label) !!}</label>
  @endisset
</div>
