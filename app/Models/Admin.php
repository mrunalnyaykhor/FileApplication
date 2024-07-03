<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    public $primaryKey ='id';
    public $timestamps=false;
    public $fillable =['firstName','lastName','address','email','username','password','mobile'];
}
