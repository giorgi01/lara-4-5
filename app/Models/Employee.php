<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $fillable = [
        'name',
        'lastname',
        'birthdate',
        'personal_id',
        'salary',
        'company_id'
    ];
    public $table = 'employees';
    public $timestamps = false;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
