<?php

namespace App\Http\Filters\Reports;

use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class ReportFilter extends AbstractFilter
{
    public const DATE = 'date';

    protected function getCallbacks(): array
    {
        return [
            self::DATE => [$this, 'date'],
        ];
    }

    public function date(Builder $builder, $value)
    {
        $builder->whereDate('sleep_start_at', '=', $value);
    }
}
