<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $primaryKey = 'Schedule_ID';

    protected $fillable = [
        'StartTime',
        'EndTime',
    ];

}
