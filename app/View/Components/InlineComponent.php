<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InlineComponent extends Component
{
    /**
     * sample property.
     *
     * @var string
     */
    public $sampleProp;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($sampleProp)
    {
        //
        $this->sampleProp = $sampleProp;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return <<<'blade'
<div>
    <p>このコンポーネントはインラインコンポーネントとして作られています。</p>
    <p>sampleProp に与えられた値は「{{ $sampleProp }}」です。</p>
    {{ $slot }}
</div>
blade;
    }
}
