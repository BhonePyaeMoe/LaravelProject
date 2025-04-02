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

    public function consultingCountries()
    {
        return $this->hasMany(ConsultingCountry::class, 'Consultant_ID', 'Consultant_ID');
    }

    public function countries()
    {
        return $this->hasManyThrough(
            Country::class,
            ConsultingCountry::class,
            'Consultant_ID', // Foreign key on ConsultingCountry table
            'Country_ID',    // Foreign key on Country table
            'Consultant_ID', // Local key on Consultant table
            'Country_ID'     // Local key on ConsultingCountry table
        );
    }
}
