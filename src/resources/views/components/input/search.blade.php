@props([
	"name" => '',
	"value" => '',
	"type" => 'string',
	"label" => "",
	"placeholder" => "Search...",
	"required" => false,
	"btn" => false,
	"inline" => false,
	"variants" => [],
	"id" => null,
])

@if($label)
  <label class="@if(!!$required) required @endif" for="{{ $id }}">{!! __($label) !!}</label>
@endif
<div @class(['search-box'])>
    <input class="form-control" type="search" name="{{ $name }}" @required(!!$required) value="{{ $value }}"
           placeholder="{{ $placeholder }}" id="{{ $id }}" {{ $attributes }}>
    <i class="ri-search-line search-icon"></i>
</div>
