<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    use HasFactory;

    protected $table = 'usertype'; // Correct table name

    protected $primaryKey = 'Type_ID';

    protected $fillable = [
        'TypeName',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'Type_ID', 'Type_ID');
    }
}
