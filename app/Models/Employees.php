<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employees extends Model
{
    protected $table = 'employees';

    protected $fillable = [
        'firstname',
        'lastname',
        'company'
    ];
    use HasFactory, SoftDeletes;
}
