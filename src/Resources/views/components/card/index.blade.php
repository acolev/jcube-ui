@props([
    'body' => true,
    'headerCls' => '',
    'bodyCls' => '',
])
<div class="card">
  @isset($header)
    <div @class([$headerCls, 'card-header']) {{ $header->attributes }}>
      {{ $header }}
    </div>
  @endisset
  @if($body)
    <div @class(['card-body' => $body, $bodyCls]) {{ $attributes }}>
      {{$slot}}
    </div>
  @else
    {{$slot}}
  @endif
  @isset($footer)
    <div @class([$headerCls, 'card-footer']) {{ $footer->attributes }}>
      {{ $footer }}
    </div>
  @endisset
</div>

