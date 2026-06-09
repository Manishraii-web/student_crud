<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'phone',
        'subject'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function attendance(){
        return $this->hasMany(Attendance::class);
    }
}
