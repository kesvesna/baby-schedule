<?php

namespace App\Models\Eats;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eat extends Model
{
    use HasFactory, Filterable;

    protected $table = 'eats';

    protected $fillable = [
        'eat_finish_at',
        'user_id'
    ];
}
