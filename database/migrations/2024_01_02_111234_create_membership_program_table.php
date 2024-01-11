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
        Schema::create('membership_program', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_id')->references('id')->on('programs')->onDelete('cascade');
            $table->foreignId('membership_plan_id')->references('id')->on('membership_plans')->onDelete('cascade');
            // $table->string('member_payment_type')->nullable();
            $table->enum('member_payment_type',['Free Program','Paid Program','Not Allowed'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membership_program');
    }
};
