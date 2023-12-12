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
        Schema::create('dish_offered_menus', function (Blueprint $table) {
            $table->unsignedBigInteger('dish_id');
            $table->unsignedBigInteger('menu_offered_id');
            $table->primary(['dish_id', 'menu_offered_id']);
            $table->foreign('dish_id')->references('id')->on('dishes');
            $table->foreign('menu_offered_id')->references('id')->on('offered_menus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dish_offered_menus');
    }
};
