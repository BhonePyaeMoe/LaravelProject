<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $primaryKey = 'Appointment_ID';
    protected $fillable = [
        'User_ID',
        'Consultant_ID',
        'Appointment_Topic',
        'Appointment_Note',
        'Appointment_StartTime',
        'Appointment_EndTime',
        'AppointmentDate',
        'User_Information',
        'Status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'User_ID', 'User_ID');
    }

    public function consultant()
    {
        return $this->belongsTo(Consultant::class, 'Consultant_ID', 'Consultant_ID');
    }
}
