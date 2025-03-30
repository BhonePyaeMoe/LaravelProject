<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultingCountry extends Model
{
    use HasFactory;

    protected $table = 'consultingcountries';

    protected $primaryKey = 'Consultingcountry_ID';

    protected $fillable = [
        'Consultant_ID',
        'Country_ID'
    ];

    public function consultant()
    {
        return $this->belongsTo(Consultant::class, 'Consultant_ID', 'Consultant_ID');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'Country_ID', 'Country_ID');
    }
}
