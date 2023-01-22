<?php

namespace App\Models\Eats;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eat extends Model
{
    use HasFactory;

    protected $table = 'eats';

    protected $fillable = [
        'eat_finish_at',
    ];
}
