<?php

namespace Larafun\Model\Traits;

use Illuminate\Database\Query\Builder as QueryBuilder;
use Larafun\Model\Builder;

trait RealScopes
{
    public function newEloquentBuilder($query)
    {
        return new Builder($query);
    }
}