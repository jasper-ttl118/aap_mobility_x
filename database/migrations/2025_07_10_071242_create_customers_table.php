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
        Schema::create('customers', function (Blueprint $table) {
            $table->id('customer_id');
            $table->string('customer_firstname', 255);
            $table->string('customer_middlename', 255)->nullable();
            $table->string('customer_surname', 255);
            $table->string('customer_organization', 255);
            $table->string('customer_email', 255);
            $table->string('customer_mobile_number', 255);
            $table->date('customer_birthdate');
            $table->tinyInteger('customer_status')->unsigned(); // tinyint(1), with index

            // Index for customer_status
            $table->index('customer_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
