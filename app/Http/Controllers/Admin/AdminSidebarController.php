<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminSidebarController extends Controller
{
    /**
     * Get sidebar items
     *
     * @return array
     */
    public static function getSidebarItems()
    {
        return [
            [
                'title' => __('general.manage'),
                'icon'  => 'fa-users-cog',
                'roles' => [],
                'children' => [
                    [
                        'title' => __('general.profile'),
                        'icon'  => 'fa-user',
                        'route' => route('profile'),
                        'roles' => [],
                    ],
                    [
                        'title' => __('general.users'),
                        'icon'  => 'fa-users-cog',
                        'route' => route('dashboard'),
                        'roles' => [],
                    ],
                    [
                        'title' => __('general.logs'),
                        'icon'  => 'fa-clipboard-list',
                        'route' => route('logs'),
                        'roles' => ['programmer','super-programmer'],
                    ],
                ]
            ],
            [
                'title' => __('general.style'),
                'icon'  => 'fa-paint-brush',
                'roles' => ['programmer','super-programmer'],
                'children' => [
                    [
                        'title' => __('general.pages'),
                        'icon'  => 'fa-file-alt',
                        'route' => route('pages.index'),
                        'roles' => [],
                    ],
                    [
                        'title' => __('general.style'),
                        'icon'  => 'fa-paint-brush',
                        'route' => route('style.edit'),
                        'roles' => [],
                    ]
                ]
            ],
            [
                'title' => __('general.items'),
                'icon'  => 'fa-home',
                'roles' => [],
                'route' => route('items.index'),
                'children' => []
            ],
            [
                'title' => __('general.categories'),
                'icon'  => 'fa-map-marker-alt',
                'roles' => [],
                'route' => route('categories.index'),
                'children' => []
            ],
            [
                'title' => __('general.attributes'),
                'icon'  => 'fa-list-alt',
                'roles' => [],
                'route' => route('attributes.index'),
                'children' => []
            ]
        ];
    }
}
