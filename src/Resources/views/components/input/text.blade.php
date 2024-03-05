@props([
	"name" => '',
	"value" => '',
	"attrType" => 'text',
	"label" => "",
	"placeholder" => "",
	"required" => false,
	"btn" => false,
	"inline" => false,
	"variants" => [],
	"id" => null,
	"class" => '',
	"groupTextPre" => null,
	"groupTextPost" => null,
])

@if($label)
    <label class="@if(!!$required) required @endif" for="{{ $id }}">{!! __($label) !!}</label>
@endif
<div class="input-group">
    @isset($groupTextPre)
        <span class="input-group-text">{{ $groupTextPre }}</span>
    @endisset
    <input @class(['form-control',$class]) type="{{ $attrType }}" name="{{ $name }}"
           @required(!!$required) value="{{ $value }}"
           placeholder="{{ $placeholder }}" id="{{ $id }}" {{ $attributes }}>
    @isset($groupTextPost)
        <span class="input-group-text">{{ $groupTextPost }}</span>
    @endisset
</div>
