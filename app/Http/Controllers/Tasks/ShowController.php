<?php

namespace App\Http\Controllers\Tasks;

use App\Models\Tag;
use App\Models\Tasks;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ShowController extends BaseController
{
    public function __invoke($id)
    {
        $tasks = Tasks::find($id);
        $tags = Tag::all();
        return view('tasks.show', compact('tasks', 'tags'));

    }
}
