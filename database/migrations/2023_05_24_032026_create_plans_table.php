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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('pesticide_type');
            $table->string('seed_type');
            $table->integer('weight');
            $table->integer('height');
            $table->string('shape');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->unsignedBigInteger("drone_id");
            $table->foreign("drone_id")->references("id")->on("drones")->onDelete("cascade");
            $table->unsignedBigInteger("instruction_id");
            $table->foreign("instruction_id")->references("id")->on("instructions")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');

    }
};
