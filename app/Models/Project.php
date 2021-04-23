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
        'current_employee_id',
        'client_id',
        'current_status_id',
        'service_id',
        'description',
    ];

    public function status()
    {
        return $this->belongsToMany(Status::class, 'project_statuses', 'project_id', 'status_id')
                    ->orderBy('date_created', 'asc')
                    ->withPivot('date_created');
    }

    public function currentEmployee()
    {
        return $this->belongsTo(Employee::class, 'current_employee_id');
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
