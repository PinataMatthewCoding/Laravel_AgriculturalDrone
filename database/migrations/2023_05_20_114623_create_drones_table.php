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
            $table->string("drone_id");
            $table->string("country");
            $table->string("company");
            $table->string("endurance");
            $table->string("range");
            $table->string("battery");
            $table->string("playload_cap");
            $table->string("max_speed");
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->unsignedBigInteger("map_id");
            $table->foreign("map_id")->references("id")->on("maps")->onDelete("cascade");
            $table->unsignedBigInteger("location_id");
            $table->foreign("location_id")->references("id")->on("locations")->onDelete("cascade");
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
