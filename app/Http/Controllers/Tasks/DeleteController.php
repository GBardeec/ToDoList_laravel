<?php

namespace App\Http\Controllers\Tasks;

use App\Models\Tasks;

class DeleteController extends BaseController
{
    public function __invoke(Tasks $tasks)
    {
        $tasks -> delete();
        return redirect()->route('tasks.index');
    }
}
