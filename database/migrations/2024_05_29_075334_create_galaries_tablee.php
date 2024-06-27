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
        // Schema::create('galaries', function (Blueprint $table) {
        //     $table->id();

        //     $table->string("fileName");
        //     $table->timestamps();
        //     $table->string('fileSize');
        //     $table->string('owner');

        // });
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('path');
            $table->timestamps();
            $table->string('owner');
            $table->string('email');

            $table->user_id();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galaries');
    }
};
