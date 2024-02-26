<?php

namespace jCube\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use jCube\Components\ColumnItem;
use jCube\Components\ColumnsOrTabs;
use jCube\Components\DataTable;
use jCube\Components\TabItem;
use jCube\Components\Table;
use jCube\Components\TableItem;
use jCube\Components\Tabs;

class jCubeUIServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerLoads();
        $this->registerComponents();

        view()->share([
            'global_components_path' => dirname(__DIR__) . '/Resources/views/components/',
        ]);

        Paginator::useBootstrap();
    }

    protected function registerLoads()
    {
        $this->loadMigrationsFrom(dirname(dirname(__DIR__)) . '/database/migrations');
        $this->loadViewsFrom(dirname(__DIR__) . '/Resources/views', 'ui');
    }

    protected function registerComponents()
    {
        $this->loadViewComponentsAs(null , [
            Tabs::class,
            TabItem::class,

            ColumnsOrTabs::class,
            ColumnItem::class,

            Table::class,
            TableItem::class,
            DataTable::class,
        ]);
        Blade::anonymousComponentPath(dirname(__DIR__) . '/Resources/views/components');
    }
}
