<?php

namespace App\Http\Filters\Walks;

use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class WalkFilter extends AbstractFilter
{
    public const WALK_START_AT = 'date';

    protected function getCallbacks(): array
    {
        return [
            self::WALK_START_AT => [$this, 'date'],
        ];
    }

    public function date(Builder $builder, $value)
    {
        $builder->whereDate('walk_start_at', '=', $value);
    }
}
