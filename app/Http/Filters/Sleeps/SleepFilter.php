<?php

namespace App\Http\Filters\Sleeps;

use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class SleepFilter extends AbstractFilter
{
    public const SLEEP_START_AT = 'date';

    protected function getCallbacks(): array
    {
        return [
            self::SLEEP_START_AT => [$this, 'date'],
        ];
    }

    public function date(Builder $builder, $value)
    {
        $builder->whereDate('sleep_start_at', '=', $value);
    }
}
