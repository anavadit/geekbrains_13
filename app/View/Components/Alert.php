<?php

namespace App\View\Components;

use Illuminate\View\Component;

/**
 * Дефолтный компонент создаваемый командой: $ ./vendor/bin/sail php artisan make:component Alert
 */
class Alert extends Component
{

    public $type;
    public $message;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $type, string $message)
    {
        
        $this->type = $type;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
