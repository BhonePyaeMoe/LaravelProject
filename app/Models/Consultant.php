<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultant extends Model
{
    use HasFactory;

    protected $primaryKey = 'Consultant_ID'; // Specify the primary key column name

    protected $fillable = [
        'Consultant_Name',
        'Profile',
        'Experience',
        'Consultant_Email',
    ];
}
