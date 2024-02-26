<!doctype html>
@include('ui::layouts.part.settings', [
    'layout' => $variant ?? 'vertical',
    'topbarColor' => $topbarColor ?? 'light',
    'sidebarColor' => $sidebarColor ?? 'dark',
    'sidebarSize' => $sidebarSize ?? 'lg',
    'sidebarImage' => $sidebarImage ?? 'none',
    'layoutWidth' => $layoutWidth ?? 'fluid',
    'preloader' => $preloader ?? 'disable',
])
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @stack('meta')
    @include('ui::layouts.part.head')
</head>
<body>
@yield('body')

@include('ui::layouts.part.foot')
</body>
</html>
