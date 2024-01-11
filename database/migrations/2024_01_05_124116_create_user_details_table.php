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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');

            // for Profile
            $table->string('dob')->nullable();
            $table->text('about_your_self')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('other_contact_number')->nullable();
            $table->string('address')->nullable();


            // for Education
            $table->string('university_name')->nullable();
            $table->string('college_name')->nullable();
            $table->text('about_education')->nullable();


            // for Company Details
            $table->string('name_of_company')->nullable();
            $table->string('company_turn_over')->nullable();
            $table->string('number_of_employee')->nullable();

            // for Organization
            $table->string('organization_name')->nullable();
            $table->string('organization_size')->nullable();
            $table->string('organization_budget')->nullable();
            $table->string('focus_area')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
