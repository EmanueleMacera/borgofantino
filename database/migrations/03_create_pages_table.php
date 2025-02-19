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
    public function up(): void
    {
        // Create the 'pages' table
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Page title
            $table->string('slug')->unique(); // Unique URL slug
            $table->boolean('homepage')->default(false); // Indicates if this page is the homepage
            $table->enum('status', ['draft', 'publish'])->default('draft'); // Page status
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        // Drop the 'pages' table
        Schema::dropIfExists('pages');
    }
};
