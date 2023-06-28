<?php

namespace App\Http\Controllers\Request;

use App\Http\Controllers\Controller;
use App\Services\Request\Service;

class BaseController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
