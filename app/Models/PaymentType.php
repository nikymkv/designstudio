<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    public $timestamps = FALSE;

    protected $fillable = [
        'name',
    ];
}
