<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $quarded = [];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}
