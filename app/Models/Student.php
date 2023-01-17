<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $timestamps = false;
    use HasFactory;
       /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
        'birth',
        'motivation',
    ];
}
