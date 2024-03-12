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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('name');
            $table->string('phone');
            $table->string('address');
            $table->string('city');
            $table->string('zip')->nullable();
            $table->string('BusinessName')->nullable();
            $table->string('trackingId')->unique(true)->nullable(); // for external services like
            $table->integer('tracking_mode')->default(0); // for external services like
            $table->string('status')->default('Pending'); // for external services like
            $table->string('payment_mode')->nullable();
            $table->string('total'); // for external services like
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
