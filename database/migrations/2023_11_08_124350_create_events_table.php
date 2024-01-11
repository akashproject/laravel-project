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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->string('image')->nullable();
            // $table->foreignId('user_id')->nullable()->references('id')->on('users');
            $table->string('organizer_name')->nullable();
            $table->string('from_date',120)->nullable();
            $table->string('to_date',120)->nullable();
            $table->timestamp('event_date')->nullable();
            $table->double('price',8,2)->nullable();
            $table->string('location')->nullable();
            $table->enum('event_type',['Free Event','Paid Event'])->nullable();
            $table->string('num_of_seat')->nullable();
            $table->tinyInteger('is_guest')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
