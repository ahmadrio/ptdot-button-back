<?php

namespace Opanegro\PtdotButtonBack;

use Laravel\Nova\Nova;
use Laravel\Nova\Tool;

class PtdotButtonBack extends Tool
{
    protected $loadStyles = true;

    /**
     * Perform any tasks that need to happen when the tool is booted.
     *
     * @return void
     */
    public function boot()
    {
        Nova::script('ptdot-button-back', __DIR__.'/../dist/js/tool.js');
        if ($this->loadStyles) {
            Nova::style('ptdot-button-back', __DIR__ . '/../dist/css/tool.css');
        }
    }

    /**
     * Build the view that renders the navigation links for the tool.
     *
     * @return bool
     */
    public function renderNavigation()
    {
        return false;
    }

    /**
     * if not include default styles
     *
     * @return $this
     */
    public function withoutStyles()
    {
        $this->loadStyles = false;
        return $this;
    }
}
