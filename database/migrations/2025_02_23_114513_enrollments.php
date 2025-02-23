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
            $table->uuid('uuid')->unique()->nullable();
            $table->char('student_uuid', 36)->nullable();
            $table->string('academic_year')->nullable();
            $table->string('semester')->nullable();
            $table->date('date_enrolled')->nullable();
            $table->enum('status', ['Enrolled', 'Pending', 'Dropped'])->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('enrollments');
    }
};
