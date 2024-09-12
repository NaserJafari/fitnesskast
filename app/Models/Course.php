<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subscribers()
    {
        return $this->belongsToMany(User::class, 'course_subscribed', 'course_id', 'user_id');
    }
}
