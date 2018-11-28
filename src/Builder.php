<?php

namespace Larafun\Model;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class Builder extends EloquentBuilder
{
    public function __call($method, $parameters)
    {
        /** 
         * this breaks the macro order in the parent::_call, but it was 
         * easier to experiment with.
         */
        if (method_exists($this->model, $scope = 'realScope'.ucfirst($method))) {
            if (!$this->realScopeParameters($parameters)) {
                return $this;
            }
            return $this->callScope([$this->model, $scope], $parameters);
        }
        return parent::__call($method, $parameters);
    }

    /**
     * Real Parameters are all non empty values, but including false and
     * excepting one element arrays with the element being an empty value
     */
    protected function realScopeParameters($parameters)
    {
        foreach ($parameters as $parameter) {
            if ((empty($parameter) && ($parameter !== false))
                || (is_array($parameter) && (count($parameter) == 1) && empty($parameter[0]))
            ) {
                return false;
            }
        }
        return true;
    }
}