<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Service\TaskService;

class BaseController extends Controller
{
    public $service;

    public function __construct(TaskService $service) {
        $this->service = $service;
    }

}
