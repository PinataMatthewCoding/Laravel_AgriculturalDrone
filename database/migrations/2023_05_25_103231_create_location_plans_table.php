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
        Schema::create('location_plans', function (Blueprint $table) {
            $table->id();     
            $table->unsignedBigInteger("location_id");
            $table->foreign("location_id")->references("id")->on("locations")->onDelete("cascade");
            $table->unsignedBigInteger("plan_id");
            $table->foreign("plan_id")->references("id")->on("plans")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('location_plans');
    }
};
