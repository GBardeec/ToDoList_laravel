<?php

namespace App\Http\Controllers\Tasks;

use App\Models\Tag;
use App\Models\Tasks;


class EditController extends BaseController
{
    public function __invoke(Tasks $tasks)
    {
        $tags = Tag::all();
        return view('tasks.edit', compact('tasks', 'tags'));
    }
}
