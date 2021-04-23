<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectStatus extends Model
{
    public $timestamps = FALSE;

    protected $fillable = [
        'status_id',
        'project_id',
        'employee_id',
        'date_created',
    ];
}
