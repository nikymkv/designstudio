<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'dob',
        'phone',
        'payment_type_id',
        'hourly_payment',
        'is_admin',
        'hired',
        'dismissed',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function payment()
    {
        return $this->belongsTo(PaymentType::class, 'payment_type_id', 'id');
    }

    public function specs()
    {
        return $this->belongsToMany(Specialization::class, 'employee_specializations', 'employee_id', 'specialization_id');
    }

    public function specsToString()
    {
        $specs = $this->specs;
        $arr = [];
        foreach ($specs as $spec) {
            $arr[] = $spec->name;
        }
        return implode(', ', $arr);
    }

    public function scopeFinished($query)
    {
        return $query->where('current_status_id', 23);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_employees', 'employee_id', 'project_id');
    }

    public function availableProjects()
    {
        return $this->projects->where('current_status_id', '!=', 23);
    }
}
