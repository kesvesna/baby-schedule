<?php

namespace App\Http\Filters\Diapers;

use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class DiaperFilter extends AbstractFilter
{
    public const CHANGED_AT = 'date';

    protected function getCallbacks(): array
    {
        return [
            self::CHANGED_AT => [$this, 'date'],
        ];
    }

    public function date(Builder $builder, $value)
    {
        $builder->whereDate('changed_at', '=', $value);
    }
}
