<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $table = 'company';

    protected $fillable = [
        'companyname',
        'companyemail',
        'logo',
        'website'
    ];

    use HasFactory;
}
