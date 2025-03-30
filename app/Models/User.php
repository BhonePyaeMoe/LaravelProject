<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'User_ID'; // Specify the primary key column name

    protected $fillable = [
        'User_Name',
        'User_Email',
        'User_Password',
        'User_Age',
        'User_Phone',
        'Type_ID',
    ];

    protected $hidden = [
        'User_Password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if (!Hash::needsRehash($user->User_Password)) {
                $user->User_Password = bcrypt($user->User_Password);
            }
        });
    }

    public function userType()
    {
        return $this->belongsTo(UserType::class, 'Type_ID', 'Type_ID');
    }
}