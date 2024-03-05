@props([
  'pageTitle',
  'home' => 'admin.dashboard',
  'items' => [],
])
@php($count = count($items))
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{ __(@$pageTitle) }}</h4>

            <div class="page-title-right">
                @if(!$slot->isEmpty())
                    {{ $slot }}
                @else
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route($home) }}"><i class="ri-home-3-line"></i></a>
                            </li>
                            @foreach($items as $index=>$item)
                                @if($index === $count - 1)
                                    <li class="breadcrumb-item active" aria-current="page">
                                        {{ $item['title'] ?? __('Unnamed') }}
                                    </li>
                                @else
                                    <li class="breadcrumb-item">
                                        <a href="{{$item['url'] ?? '#'}}">{{ $item['title'] ?? __('Unnamed') }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ol>
                    </nav>
                @endif
            </div>
        </div>
    </div>
</div>
