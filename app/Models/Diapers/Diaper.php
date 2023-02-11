<?php

namespace App\Models\Diapers;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diaper extends Model
{
    use HasFactory, Filterable;

    protected $table = 'diaper_changes';

    protected $fillable = [
        'changed_at',
        'user_id',
        'comment'
    ];
}
