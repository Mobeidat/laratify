<?php

namespace Muhsenmaqsudi\Componel\View\Components;

use Illuminate\View\Component;
use Muhsenmaqsudi\Componel\Traits\HasInputAttributes;
use Muhsenmaqsudi\Componel\Traits\OptionFormatter;

class Select extends Component
{
    use HasInputAttributes, OptionFormatter;
    public $options;
    public $first;

    /**
     * Create a new component instance.
     *
     * @param $name
     * @param $label
     * @param array $options
     * @param null $id
     * @param bool $disabled
     * @param bool $first
     * @param string $value
     */
    public function __construct($name, $label, array $options, $id = null, $disabled = false, $first = false, $value = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->options = $this->formatOptions($options);
        $this->id = $id;
        $this->disabled = $disabled;
        $this->first = $first;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('componel::components.select');
    }
}