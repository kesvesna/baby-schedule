<?php

namespace App\Models\Walks;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Walk extends Model
{
    use HasFactory, Filterable;

    protected $table = 'walks';

    protected $fillable = [
        'walk_finish_at',
        'user_id'
    ];
}
