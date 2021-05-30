<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectEmployees extends Model
{
    protected $fillable = [
        'project_id',
        'employee_id',
    ];
}
