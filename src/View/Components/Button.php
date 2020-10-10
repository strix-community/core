<?php

/*
 * This file is part of Strix.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

namespace Strix\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public string $type;

    public string $backgroundColor;

    public string $textColor;

    const DEFAULT_TYPE = 'submit';

    const DEFAULT_BACKGROUND_COLOR = '';

    const DEFAULT_TEXT_COLOR = '';

    /**
     * Create a new component instance.
     *
     * @param string $type
     * @param string $backgroundColor
     * @param string $textColor
     */
    public function __construct(
        string $type = self::DEFAULT_TYPE,
        string $backgroundColor = self::DEFAULT_BACKGROUND_COLOR,
        string $textColor = self::DEFAULT_TEXT_COLOR
    ) {
        $this->type = $type;
        $this->backgroundColor = $backgroundColor;
        $this->textColor = $textColor;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.button');
    }
}
