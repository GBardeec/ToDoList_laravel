<?php

namespace App\Http\Controllers\Tasks;

use App\Filters\ProductFilter;
use App\Http\Requests\Tasks\IndexRequest;
use App\Models\Tag;
use App\Models\Tasks;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class IndexController extends BaseController
{
    public function __invoke(IndexRequest $request)
    {
        $data = $request->validated();
        $this -> user = Auth::user();
        $tags = Tag::all();
        $tasks = Tasks::query()->where('user_id', $this->user->id)->when(isset($data['tags']), function (Builder $builder) use ($data) {
            $builder-> whereHas('tags', function(Builder $query) use ($data) {
                $query->whereIn('title', $data['tags']);
            });
        })->get();

//        $tasks = Tasks::where('user_id', $this->user->id)->get();
        return view('tasks.index', compact('tasks', 'tags'));
    }

}


//        $this->user = Auth::user();
//
//        $tasks = Tasks::with('tags')->whereHas('tags', function ($query) {
//            $query->where('user_id', $this->user->id);
//        })->get();
//
//        $tags = Tag::all();
//
//        $filteredTasks = $filters->apply($tasks, $request->input('tags', []));
//
//        return view('tasks.index', compact('filteredTasks', 'tags'));
