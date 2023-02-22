<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'firstname',
        'lastname',
        'company_id',
        'email',
        'phone',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
