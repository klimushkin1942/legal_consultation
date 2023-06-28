<?php

namespace App\Http\Filters;

use Carbon\Carbon;

class RequestFilter extends QueryFilter
{
    public function limit()
    {
        $this->builder->limit($this->request['limit']);
    }

    public function dateBegin()
    {
        $this->builder
            ->orWhereDate(
                'created_at',
                '>=',
                $this->request['date_begin']
            );
    }

    public function dateEnd()
    {
        $this->builder
            ->orWhereDate(
                'created_at',
                '<=',
               $this->request['date_end']
            );
    }

    public function status()
    {
        $this->builder->orWhere('status', $this->request['status']);
    }
}
