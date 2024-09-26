<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $primaryKey = 'employee_id';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'dob',
        'image_path',
    ];
}
