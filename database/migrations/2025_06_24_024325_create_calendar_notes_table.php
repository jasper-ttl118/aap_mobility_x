<?php
// database/migrations/xxxx_xx_xx_create_calendar_notes_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('calendar_notes', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->text('note');
            $table->string('category', 50)->default('personal');
            $table->timestamps();
            
            $table->unique('date'); // One note per date
        });
    }

    public function down()
    {
        Schema::dropIfExists('calendar_notes');
    }
};