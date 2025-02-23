<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->char('subject_uuid', 36);
            $table->char('lecturer_uuid', 36);
            $table->string('schedule');
            $table->string('room_number');
            $table->timestamps();
            $table->softDeletes();
        });        
    }

    public function down()
    {
        Schema::dropIfExists('classes');
    }
};
