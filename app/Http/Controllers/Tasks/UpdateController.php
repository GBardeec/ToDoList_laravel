<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Requests\Tasks\UpdateRequest;
use App\Models\Tasks;


class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Tasks $tasks)
    {
        $data = $request->validated();
        $tasks = $this->service->update($data, $tasks);

        return view('tasks.show', compact('tasks'));

    }
}
