<?php

namespace jCube\Components;

use Illuminate\View\Component;

class TabItem extends Component
{
  public string $name;

  public function __construct($name = '')
  {
    $this->name = $name;
  }

  public function render()
  {
    return view('ui::components::tabs.item');
  }
}
