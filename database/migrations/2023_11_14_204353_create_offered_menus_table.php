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
        Schema::create('offered_menus', function (Blueprint $table) {
            $table->id();
            $table->decimal('price', 10, 2)->nullable(false);
            $table->date('date')->nullable(false);
            $table->string('photo', 256)->nullable();
            $table->char('status', 1)->nullable(false);
            $table->unsignedBigInteger('semester_id')->nullable(false);
            $table->unsignedBigInteger('type_menu_id')->nullable(false);
            $table->unsignedBigInteger('schedule_id')->nullable(false);
            $table->unsignedBigInteger('category_id')->nullable(false);
            $table->foreign('semester_id')->references('id')->on('semesters');
            $table->foreign('type_menu_id')->references('id')->on('type_menus');
            $table->foreign('schedule_id')->references('id')->on('schedules');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offered_menus');
    }
};
