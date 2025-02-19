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
        // Create the 'items' table
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->text('adress')->nullable();
            $table->decimal('latitude')->nullable();
            $table->decimal('longitude')->nullable();
            $table->text('description')->nullable();
            $table->integer('bagni')->nullable();
            $table->integer('camere')->nullable();
            $table->integer('posti_letto')->nullable();
            $table->text('nei_dintorni')->nullable();
            $table->string('link')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->enum('status', ['draft', 'publish'])->default('draft');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });

        // Create the 'item_photos' table
        Schema::create('item_media', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained('items')->onDelete('cascade');
            $table->string('path')->nullable();
            $table->string('type')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
        Schema::dropIfExists('item_media');
    }
};
