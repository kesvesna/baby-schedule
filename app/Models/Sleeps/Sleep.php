<?php

namespace App\Models\Sleeps;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sleep extends Model
{
    use HasFactory;

    protected $table = "sleeps";

    protected $fillable = [
        'sleep_finish_at',
    ];
}
