<?php

namespace jCube\Components;

use Illuminate\View\Component;

class Table extends Component
{
    public function __construct(
        public int $perPage = 20,
        public int $currentPage = 1,
        public bool $dark = false,
        public bool $responsive = true,
        public array $fields = [],
        public bool $header = true,
        public bool $footer = false,
        public bool $nowrap = true,
        public bool $bordered = false,
        public bool $striped = false,
        public bool $stripedColumns = false,
        public bool $hover = false,
        public bool $card = false,
        public ?string $id = null
    )
    {
        $this->id = $id ?: genTrx(6, 'qwertyuiopasdfghjklzxcvbnm');

        view()->composer('ui::components.table.item', function ($view) {
            $view->with([
                'fields' => $this->fields,
            ]);
        });
    }

    public function render()
    {
        return view('ui::components.table.index');
    }
}
