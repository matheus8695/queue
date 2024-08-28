<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('pull_requests', function (Blueprint $table) {
            $table->id();
            $table->string('api_id');
            $table->string('api_number');
            $table->string('api_state');
            $table->string('api_title');
            $table->dateTime('api_created_at');
            $table->dateTime('api_updated_at');
            $table->dateTime('api_merged_at')->nullable();
            $table->dateTime('api_closed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pull_requests');
    }
};
