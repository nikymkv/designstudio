<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $timestamps = FALSE;

    protected $fillable = [
        'name_company',
        'scope',
        'date_created',
        'deadline',
        'proposed_payment',
        'price',
        'client_id',
        'current_status_id',
        'service_id',
        'description',
        'answers',
    ];

    protected $casts = [
        'answers' => 'array',
    ];

    public function status()
    {
        return $this->belongsToMany(Status::class, 'project_statuses', 'project_id', 'status_id')
                    ->orderBy('date_created', 'asc')
                    ->withPivot('date_created');
    }

    public function currentEmployees()
    {
        return $this->belongsToMany(Employee::class, 'project_employees', 'project_id', 'employee_id');
    }

    public function currentEmployeesToStr()
    {
        $employees = $this->currentEmployees;
        $arr = [];
        foreach ($employees as $employee) {
            $arr[] = $employee->name;
        }
        
        return implode(', ', $arr);
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
