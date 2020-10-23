<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $appends = ['created_date'];

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }
}
