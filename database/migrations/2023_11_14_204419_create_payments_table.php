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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 10, 2)->nullable(false);
            $table->char('payment_method', 1)->nullable(false)->check("payment_method IN ('A', 'B', 'C', 'E')");
            $table->char('receipt', 250)->nullable(false);
            $table->char('status', 1)->nullable(false);
            $table->unsignedBigInteger('reservation_id')->nullable(false);
            $table->unsignedBigInteger('entry_register_id')->nullable(false);
            $table->foreign('reservation_id')->references('id')->on('reservations');
            $table->foreign('entry_register_id')->references('id')->on('entry_registers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
