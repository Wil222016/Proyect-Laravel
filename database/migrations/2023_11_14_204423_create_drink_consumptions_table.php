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
        Schema::create('drink_consumptions', function (Blueprint $table) {
            $table->integer('quantity')->nullable(false);
            $table->decimal('unit_price', 10, 2)->nullable(false);
            $table->unsignedBigInteger('entry_register_id')->nullable(false);
            $table->unsignedBigInteger('drink_id')->nullable(false);
            $table->primary(['entry_register_id', 'drink_id']);
            $table->foreign('entry_register_id')->references('id')->on('entry_registers');
            $table->foreign('drink_id')->references('id')->on('drinks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drink_consumptions');
    }
};
