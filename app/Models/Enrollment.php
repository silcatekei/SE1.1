<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\HasUuid;

class Enrollment extends Model
{
    use HasFactory, SoftDeletes, HasUuid;

    protected $table = 'enrollments';
    protected $fillable = ['uuid', 'student_uuid', 'academic_year', 'semester', 'date_enrolled', 'status'];
}