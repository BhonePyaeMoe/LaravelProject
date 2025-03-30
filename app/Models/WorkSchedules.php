<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkSchedules extends Model
{
    use HasFactory;

    protected $table = 'workschedules';

    protected $primaryKey = 'WorkSchedule_ID';

    protected $fillable = [
        'Consultant_ID',
        'Schedule_ID'
    ];

    public function consultant()
    {   
        return $this->belongsTo(Consultant::class, 'Consultant_ID', 'Consultant_ID');
    }
    public function schedule()
    {   
        return $this->belongsTo(Schedule::class, 'Schedule_ID', 'Schedule_ID');
    }
}
