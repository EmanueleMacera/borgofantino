<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\Style;
use Illuminate\Support\Carbon;

class StylesTableSeeder extends Seeder
{
    /**
     * Constant that defines the generic section name.
     *
     * @var string
     */
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
     * Seed the 'styles' table with default data.
     *
     * @return void
     */
    public function run(): void
    {
        // Using Eloquent Model for clarity
        Style::updateOrCreate(
            // Condition (if you only want one style row, for instance)
            ['id' => 1],
            [
                // Colors
                'primary_color'            => self::COLOR_PRIMARY,
                'secondary_color'          => self::COLOR_SECONDARY,
                'tertiary_color'           => self::COLOR_TERTIARY,
                'btn_bg_color'             => self::COLOR_BTN_BG,
                'btn_hover_bg_color'       => self::COLOR_BTN_BG_HOVER,
                'footer_bg'                => self::COLOR_PRIMARY,
                'footer_color'             => self::COLOR_TERTIARY,
                'navbar_bg'                => self::COLOR_BTN_BG,
                'navbar_link_color'        => self::COLOR_TERTIARY,
                'admin_sidebar_bg'         => self::COLOR_BTN_BG,
                'admin_sidebar_hover_bg'   => self::COLOR_BTN_BG_HOVER,
                'admin_sidebar_color'      => self::COLOR_TERTIARY,

                // Font and additional settings
                'font' => self::DEFAULT_FONT,

                // JSON columns
                'social'       => json_encode([]),
                'navbar_links' => json_encode([]),
                'footer_links' => json_encode([]),

                // Footer settings
                'footer_email'   => self::DEFAULT_EMAIL,
                'footer_phone'   => self::DEFAULT_PHONE,
                'footer_vat'     => self::DEFAULT_VAT,
                'footer_address' => self::DEFAULT_ADDRESS,

                // About
                'about' => self::DEFAULT_ABOUT,

                // Timestamps
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
    }
}
