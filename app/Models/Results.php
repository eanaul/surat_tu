<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Letters;

class Results extends Model
{
    use HasFactory;

    public function letter()
    {
        return $this->belongsTo(Letters::class);
    }
}
