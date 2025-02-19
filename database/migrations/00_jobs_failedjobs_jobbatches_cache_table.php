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
        // Create the 'jobs' table
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('queue')->index(); // Queue name
            $table->longText('payload'); // Job payload
            $table->unsignedTinyInteger('attempts'); // Number of attempts
            $table->unsignedInteger('reserved_at')->nullable(); // Reserved timestamp
            $table->unsignedInteger('available_at'); // Available timestamp
            $table->unsignedInteger('created_at'); // Created timestamp
        });

        // Create the 'job_batches' table
        Schema::create('job_batches', function (Blueprint $table) {
            $table->string('id')->primary(); // Batch ID
            $table->string('name'); // Batch name
            $table->integer('total_jobs'); // Total number of jobs
            $table->integer('pending_jobs'); // Number of pending jobs
            $table->integer('failed_jobs'); // Number of failed jobs
            $table->longText('failed_job_ids'); // IDs of failed jobs
            $table->mediumText('options')->nullable(); // Options for the batch
            $table->integer('cancelled_at')->nullable(); // Cancelled timestamp
            $table->integer('created_at'); // Created timestamp
            $table->integer('finished_at')->nullable(); // Finished timestamp
        });

        // Create the 'failed_jobs' table
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique(); // Unique identifier
            $table->text('connection'); // Connection name
            $table->text('queue'); // Queue name
            $table->longText('payload'); // Job payload
            $table->longText('exception'); // Exception details
            $table->timestamp('failed_at')->useCurrent(); // Failure timestamp
        });

        // Create the 'cache' table
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key')->primary(); // Cache key
            $table->mediumText('value'); // Cache value
            $table->integer('expiration'); // Expiration timestamp
        });

        // Create the 'cache_locks' table
        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key')->primary(); // Lock key
            $table->string('owner'); // Owner of the lock
            $table->integer('expiration'); // Expiration timestamp
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('job_batches');
        Schema::dropIfExists('failed_jobs');
        Schema::dropIfExists('cache');
        Schema::dropIfExists('cache_locks');
    }
};
