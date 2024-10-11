<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $primaryKey = 'employee_id';

    protected $table = 'employees';

    protected $fillable = [
        'first_name',
        'last_name',
        'company_id',
        'email',
        'contact',
        'profile_picture'
    ];
}
