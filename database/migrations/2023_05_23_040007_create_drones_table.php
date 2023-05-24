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
        Schema::create('drones', function (Blueprint $table) {
            $table->id();
            $table->string('amount_Time');
            $table->string('speed');
            $table->string('battery');
            $table->unsignedBigInteger('user_id');
            $table->foreign("user_id")->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('droneType_id');
            $table->foreign("droneType_id")->references('id')->on('drone_types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drones');
    }
};
