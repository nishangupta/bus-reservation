<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Bus extends Model
{
    use HasFactory;

    public function path()
    {
        return url("/bus/{$this->id}-" . Str::slug($this->name));
    }
}
