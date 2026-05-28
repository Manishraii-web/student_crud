<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'subject'
    ];

    protected $hidden = [
        'password',
    ];

    public function attendance(){
        return $this->hasMany(Attendance::class);
    }
}
