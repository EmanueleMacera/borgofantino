<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'primary_color',
        'secondary_color',
        'tertiary_color',
        'font',
        'btn_bg_color',
        'btn_hover_bg_color',
        'footer_bg',
        'footer_color',
        'navbar_bg',
        'navbar_link_color',
        'admin_sidebar_bg',
        'admin_sidebar_hover_bg',
        'admin_sidebar_color',
        'social',
        'navbar_links',
        'footer_links',
        'footer_email',
        'footer_phone',
        'footer_vat',
        'footer_address',
        'about',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'social' => 'array',
        'navbar_links' => 'array',
        'footer_links' => 'array',
    ];

    /**
     * The default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'navbar_links' => '[]',
        'social' => '[]',
        'footer_links' => '[]',
    ];
}
