<?php

namespace App\Http\Filters\Eats;

use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class EatFilter extends AbstractFilter
{
    public const EAT_START_AT = 'date';

    protected function getCallbacks(): array
    {
        return [
            self::EAT_START_AT => [$this, 'date'],
        ];
    }

    public function date(Builder $builder, $value)
    {
        $builder->whereDate('eat_start_at', '=', $value);
    }
}
