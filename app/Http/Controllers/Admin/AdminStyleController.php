<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Style;
use Illuminate\Http\Request;

class AdminStyleController extends Controller
{
    /**
     * Constant that defines the generic section name.
     *
     * @var string
     */
    const GENERIC_SECTION_NAME = 'style';
    const COLOR_PRIMARY       = '#f3f1f3';
    const COLOR_SECONDARY     = '#ebf5f0';
    const COLOR_TERTIARY      = '#000000';
    const COLOR_BTN_BG        = '#c8ebc8';
    const COLOR_BTN_BG_HOVER  = '#a0c8af';
    const DEFAULT_FONT        = 'Nunito';
    const DEFAULT_EMAIL       = 'info@example.com';
    const DEFAULT_PHONE       = '+39 0123 456 789';
    const DEFAULT_VAT         = 'IT0123456789';
    const DEFAULT_ADDRESS     = 'Via Roma 1, 10100 Torino (TO)';
    const DEFAULT_ABOUT       = 'We are committed to delivering high-quality solutions and services.';
    const REQUIRED_STRING     = 'required|string';
    const NULLABLE_ARRAY      = 'nullable|array';
    const NULLABLE_STRING     = 'nullable|string';
    const NULLABLE_EMAIL      = 'nullable|email';

    /**
     * Returns the default array for the Style fields, using constants
     * where possible to avoid duplication of literal values.
     *
     * @return array
     */
    protected function defaultAttributes(): array
    {
        return [
            'primary_color'          => self::COLOR_PRIMARY,
            'secondary_color'        => self::COLOR_SECONDARY,
            'tertiary_color'         => self::COLOR_TERTIARY,
            'font'                   => self::DEFAULT_FONT,
            'btn_bg_color'           => self::COLOR_BTN_BG,
            'btn_hover_bg_color'     => self::COLOR_BTN_BG_HOVER,
            'footer_bg'              => self::COLOR_PRIMARY,
            'footer_color'           => self::COLOR_TERTIARY,
            'navbar_bg'              => self::COLOR_BTN_BG,
            'navbar_link_color'      => self::COLOR_TERTIARY,
            'admin_sidebar_bg'       => self::COLOR_BTN_BG,
            'admin_sidebar_hover_bg' => self::COLOR_BTN_BG_HOVER,
            'admin_sidebar_color'    => self::COLOR_TERTIARY,
            'social'                 => [],
            'navbar_links'           => [],
            'footer_links'           => [],
            'footer_email'           => self::DEFAULT_EMAIL,
            'footer_phone'           => self::DEFAULT_PHONE,
            'footer_vat'             => self::DEFAULT_VAT,
            'footer_address'         => self::DEFAULT_ADDRESS,
            'about'                  => self::DEFAULT_ABOUT,
            'created_at'             => now(),
            'updated_at'             => now(),
        ];
    }

    /**
     * Displays the style edit page, retrieving the first record
     * or creating a new one with default values.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        // Retrieves or creates a new record with default values
        $style = Style::firstOrCreate([], $this->defaultAttributes());

        return view('admin.' . self::GENERIC_SECTION_NAME . '.edit', compact('style'));
    }

    /**
     * Updates the style fields with the validated request data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $data = $request->validate([
            'primary_color'          => self::REQUIRED_STRING,
            'secondary_color'        => self::REQUIRED_STRING,
            'tertiary_color'         => self::REQUIRED_STRING,
            'font'                   => self::REQUIRED_STRING,
            'btn_bg_color'           => self::REQUIRED_STRING,
            'btn_hover_bg_color'     => self::REQUIRED_STRING,
            'footer_bg'              => self::REQUIRED_STRING,
            'footer_color'           => self::REQUIRED_STRING,
            'navbar_bg'              => self::REQUIRED_STRING,
            'navbar_link_color'      => self::REQUIRED_STRING,
            'admin_sidebar_bg'       => self::REQUIRED_STRING,
            'admin_sidebar_hover_bg' => self::REQUIRED_STRING,
            'admin_sidebar_color'    => self::REQUIRED_STRING,
            'social'                 => self::NULLABLE_ARRAY,
            'navbar_links'           => self::NULLABLE_ARRAY,
            'footer_links'           => self::NULLABLE_ARRAY,
            'footer_email'           => self::NULLABLE_EMAIL,
            'footer_phone'           => self::NULLABLE_STRING,
            'footer_vat'             => self::NULLABLE_STRING,
            'footer_address'         => self::NULLABLE_STRING,
            'about'                  => self::NULLABLE_STRING,
        ]);

        // If it doesn't exist, create a new record with default values
        $style = Style::firstOrCreate([], $this->defaultAttributes());

        $data['social']       = $data['social']       ?? [];
        $data['navbar_links'] = $data['navbar_links'] ?? [];
        $data['footer_links'] = $data['footer_links'] ?? [];

        $data['updated_at'] = now();

        $style->update($data);

        return redirect()->back()->with('success', __('general.updated_successfully'));
    }

    /**
     * Returns the dynamic CSS file for the style settings.
     *
     * @return \Illuminate\Http\Response
     */
    public function commonCss()
    {
        $style = Style::first();

        return response()
            ->view('layouts.css.common', compact('style'))
            ->header('Content-Type', 'text/css');
    }

    /**
     * Returns the dynamic CSS file for the style settings.
     *
     * @return \Illuminate\Http\Response
     */
    public function customCss()
    {
        return response()
            ->view('layouts.css.custom')
            ->header('Content-Type', 'text/css');
    }
}
