<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;

    protected $primaryKey = 'University_ID';

    protected $fillable = [
        'University_Name',
        'Country_ID',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'Country_ID');
    }
}
