<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up()
    // {
    //     Schema::create('users', function (Blueprint $table) {
    //         $table->user_id();
    //         $table->string('name');
    //         $table->string('email')->unique();
    //         $table->string('email_verified_at');
    //         $table->string('password');
    //         $table->rememberToken();
    //         $table->timestamps();
    //     });
    // }
    /**
     * Reverse the migrations.
     */
    // public function down(): void
    // {
    //     Schema::dropIfExists('users');
    // }
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->id()->first(); // Adds an auto-incrementing id column as the first column
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('id');
        });
    }
};
