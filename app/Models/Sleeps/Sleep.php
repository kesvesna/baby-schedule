<?php

namespace App\Models\Sleeps;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sleep extends Model
{
    use HasFactory,  Filterable;

    protected $table = "sleeps";

    protected $fillable = [
        'sleep_finish_at',
        'user_id'
    ];
}
