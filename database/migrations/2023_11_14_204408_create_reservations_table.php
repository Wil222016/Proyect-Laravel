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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date')->nullable(false);
            $table->integer('num_people')->nullable(false);
            $table->decimal('total_amount', 10, 2)->nullable(false);
            $table->char('receipt', 250)->nullable(false);
            $table->char('status', 1)->nullable(false)->check("status IN ('A', 'B', 'C', 'D')");
            $table->unsignedBigInteger('client_id')->nullable(false);
            $table->unsignedBigInteger('person_id')->nullable(false);
            $table->unsignedBigInteger('menu_offered_id')->nullable(false);
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('person_id')->references('id')->on('people');
            $table->foreign('menu_offered_id')->references('id')->on('offered_menus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
