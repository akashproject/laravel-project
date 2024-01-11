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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->string("fullname")->nullable();
            $table->string("email")->nullable();
            $table->string("country")->nullable();
            $table->string("amount")->nullable();
            // $table->string("card_number")->nullable();
            $table->string("card_holder_name")->nullable();
            $table->string("customer_id")->nullable();
            $table->string("transaction_id")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
