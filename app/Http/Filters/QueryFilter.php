<?php

namespace App\Http\Filters;

use App\Http\Requests\Request\IndexRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

abstract class QueryFilter
{
    protected IndexRequest $request;

    protected $builder;

    public function __construct(IndexRequest $request)
    {
        $this->request = $request;
    }

    public function apply(Builder $builder)
    {
        $this->builder = $builder;

        foreach ($this->fields() as $field => $value) {
            $method = Str::camel($field);
            if (method_exists($this, $method)) {
                call_user_func_array([$this, $method], (array)$value);
            }
        }
    }

    protected function fields(): array
    {
        return $this->request->validated();
    }
}
