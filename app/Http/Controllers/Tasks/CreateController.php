<?php

namespace App\Http\Controllers\Tasks;


use App\Models\Tag;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $tags = Tag::all();
        return view('tasks.create', compact('tags'));
    }
}
