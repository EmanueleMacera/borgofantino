<?php

namespace App\Helpers;

class BreadcrumbHelper
{
    /**
     * Generate breadcrumbs for the current page.
     *
     * @return array
     */
    public static function generate()
    {
        $breadcrumbs = [];

        $breadcrumbs[] = [
            'label' => 'Home',
            'url'   => url('/'),
        ];

        $segments = request()->segments();
        $url = url('/');

        foreach ($segments as $segment) {
            $url .= '/' . $segment;
            $breadcrumbs[] = [
                'label' => ucfirst(str_replace('-', ' ', $segment)),
                'url'   => $url,
            ];
        }

        return $breadcrumbs;
    }
}
