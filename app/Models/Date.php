<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;

    protected $primaryKey = 'Date_ID';

    protected $fillable = [
        'Date',
        'Day',
    ];
}
