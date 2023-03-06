<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Items extends Model
{
    // protected $table = 'items';

    protected $fillable = [
        'name',
        'quantity',
        'rate'
    ];
    use HasFactory, SoftDeletes;
}
