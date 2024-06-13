<?php

namespace App\Models;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table ='Employees';
    protected $primarykey ="id";

    protected $fillable =[

        'name',
        'email',
        'address',
        'password',
        'mobilenumber',
        'salary',
        'created_at',
        'updated_at'
    ];
}
