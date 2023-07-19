<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Requests\Tasks\StoreRequest;
use Illuminate\Http\RedirectResponse;


class StoreController extends BaseController
{

    public function __invoke(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $this->service->store($data);
        return redirect()->route('tasks.index');
    }
}
