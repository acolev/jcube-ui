@props([
	"name" => '',
	"value" => '',
	"type" => 'string',
	"auto" => false,
	"label" => "",
	"placeholder" => "",
	"required" => false,
	"btn" => false,
	"inline" => false,
	"variants" => [],
	"id" => null,
	"simple" => false,
	"provider" => false,
	"multiple" => false,
])
@if($label)
  <label class="@if(!!$required) required @endif" for="{{ $id }}">{!! __($label) !!}</label>
@endif
<select class="form-control" @if($multiple) multiple @endif name="{{ $name }}"
        id="{{ $id }}" @required($required) {{ $attributes }}>
  @if($placeholder)
    <option value="">{{ __($placeholder) }}</option>
  @endif
  @if(isset($variants))
    @foreach($variants as $v => $variant)
      @if(@is_array($value))
        <option
            value="{{$v}}"@selected(@in_array($v, $value) || @in_array($variant, $value))>{{ __($variant) }}</option>
      @else
        <option value="{{ $simple ? $variant : $v}}" @selected($value == $v)>{{ __($variant) }}</option>
      @endif
    @endforeach
  @endif
</select>

@if($provider === 'select2')
  @pushonce('style-lib')
      <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  @endpushonce
  @pushonce('script-lib')
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  @endpushonce
  @push('script')
    <script>
      function init_select_{{$id}}() {
        @switch($auto)
        @case('auto')
        $("#{{$id}}").select2({
          tags: true,
          @if($maxItems)
          maximumSelectionLength: {{ $maxItems }}
              @endif
        });
        @break
        @default
        $("#{{$id}}").select2();
        @break
        @endswitch
      }

      init_select_{{$id}}();
    </script>
  @endpush
@endif
