<?php

namespace App\Models\Walks;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Walk extends Model
{
    use HasFactory;

    protected $table = 'walks';

    protected $fillable = [
        'walk_finish_at',
    ];
}
