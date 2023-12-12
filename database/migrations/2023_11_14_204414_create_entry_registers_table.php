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
        Schema::create('entry_registers', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date')->nullable(false);
            $table->integer('quantity')->nullable(false);
            $table->decimal('total', 10, 2)->nullable(false);
            $table->char('status', 1)->nullable(false);
            $table->unsignedBigInteger('employee_id')->nullable(false);
            $table->unsignedBigInteger('menu_offered_id')->nullable(false);
            $table->unsignedBigInteger('reservation_id')->nullable();
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('menu_offered_id')->references('id')->on('offered_menus');
            $table->foreign('reservation_id')->references('id')->on('reservations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entry_registers');
    }
};
