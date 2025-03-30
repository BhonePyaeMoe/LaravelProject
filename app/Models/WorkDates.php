<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkDates extends Model
{
    use HasFactory;

    protected $table = 'workdates';

    protected $primaryKey = 'WorkDate_ID';

    protected $fillable = [
        'Consultant_ID',
        'Date_ID'
    ];

    public function consultant()
    {   
        return $this->belongsTo(Consultant::class, 'Consultant_ID', 'Consultant_ID');
    }
    public function date()
    {   
        return $this->belongsTo(Date::class, 'Date_ID', 'Date_ID');
    }
}
