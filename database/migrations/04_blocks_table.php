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
        // Create the 'blocks' table
        Schema::create('blocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('page_id'); // Reference to the associated page
            $table->string('title')->nullable();
            $table->string('type');
            $table->integer('order')->default(0);
            $table->timestamps();

            // Foreign key referencing the 'pages' table
            $table->foreign('page_id')
                ->references('id')
                ->on('pages')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('blocks');
    }
};
