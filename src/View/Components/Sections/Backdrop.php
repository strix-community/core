<?php

/*
 * This file is part of Strix.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

namespace Strix\View\Components\Sections;

use Illuminate\View\Component;

class Backdrop extends Component
{
    public string $image;

    /**
     * Create a new component instance.
     *
     * @param string $image
     */
    public function __construct(
        string $image
    ) {
        $this->image = $image;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.sections.backdrop');
    }
}
