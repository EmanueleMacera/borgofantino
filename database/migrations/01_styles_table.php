<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create the 'styles' table
        Schema::create('styles', function (Blueprint $table) {
            $table->id();

            // Colors
            $table->string('primary_color');
            $table->string('secondary_color');
            $table->string('tertiary_color');
            $table->string('btn_bg_color');
            $table->string('btn_hover_bg_color');
            $table->string('footer_bg');
            $table->string('footer_color');
            $table->string('navbar_bg');
            $table->string('navbar_link_color');
            $table->string('admin_sidebar_bg');
            $table->string('admin_sidebar_hover_bg');
            $table->string('admin_sidebar_color');

            // Fonts and additional settings
            $table->string('font');

            // JSON columns for dynamic content
            $table->json('social')->nullable();
            $table->json('navbar_links')->nullable();
            $table->json('footer_links')->nullable();

            // Footer settings
            $table->string('footer_email', 255)->nullable();
            $table->string('footer_phone', 50)->nullable();
            $table->string('footer_vat', 50)->nullable();
            $table->string('footer_address', 255)->nullable();
            $table->text('about')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop the 'styles' table
        Schema::dropIfExists('styles');
    }
};
