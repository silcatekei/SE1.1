<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->char('student_uuid', 36);
            $table->string('academic_year');
            $table->string('semester');
            $table->date('date_enrolled');
            $table->enum('status', ['Enrolled', 'Pending', 'Dropped']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('enrollments');
    }
};
