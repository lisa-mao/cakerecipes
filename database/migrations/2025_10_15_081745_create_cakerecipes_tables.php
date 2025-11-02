<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('title', 100);
            $table->string('description', 100);

            $table->unsignedSmallInteger('total_time');
            $table->unsignedSmallInteger('prep_time');
            $table->unsignedSmallInteger('serving');

            //active : false/true (default is false until admin makes it true)
            $table->boolean('is_active')->default(false);

            $table->rememberToken();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');

    }
};
