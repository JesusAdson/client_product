<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardData extends Component
{
    /**
     * @var string
     */
    public string $title;

    /**
     * @var string
     */
    public string $text;

    /**
     * @var string
     */
    public string $show;
    
    /**
     * @var string
     */
    public string $edit;

    /**
     * @var string
     */
    public string $delete;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $title, string $text, string $show, string $edit, string $delete)
    {
        $this->title = $title;
        $this->text = $text;
        $this->show = $show;
        $this->edit = $edit;
        $this->delete = $delete;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card-data');
    }
}
