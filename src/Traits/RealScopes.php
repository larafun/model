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

    // public function __call($method, $parameters)
    // {
    //     $name = 'realScope' . ucfirst($method);
    //     if (method_exists($this, $name)) {
    //         foreach ($parameters as $value) {
    //             if (! $value) {
    //                 return $this->query();
    //             }
    //         }
    //         array_unshift($parameters, $this->query());
    //         return call_user_func_array([$this, $name], $parameters);
    //     }
    //     return parent::__call($method, $parameters);
    // }
}