<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\HasUuid;

class User extends Model
{
    use HasFactory, SoftDeletes, HasUuid;

    protected $table = 'users';
    protected $fillable = ['uuid', 'username', 'password', 'role'];
    protected $hidden = ['password'];
}