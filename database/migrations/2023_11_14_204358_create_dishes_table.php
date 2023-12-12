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
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->char('name', 50)->nullable(false);
            $table->char('description', 100)->nullable(false);
            $table->char('status', 1)->nullable(false);
            $table->unsignedBigInteger('type_dish_id')->nullable(false);
            $table->unsignedBigInteger('menu_offered_id')->nullable(false);
            $table->foreign('type_dish_id')->references('id')->on('dish_types');
            $table->foreign('menu_offered_id')->references('id')->on('offered_menus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dishes');
    }
};
