<?php

use Statamic\View\View as StatamicView;

if (!function_exists('renderAntlers')) {
    /**
     * Render Antlers view
     *
     * @param string $viewPath
     * @param array $context
     *
     * @return string
     */
    function renderAntlers(string $viewPath, array $context = []): string
    {
        if (view()->exists($viewLocation = "antlers/$viewPath")) {
            $view = StatamicView::make($viewLocation);

            return $view->with($context)->render();
        }

        return '';
    }
}
