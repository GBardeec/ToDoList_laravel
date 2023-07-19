<?php

namespace App\Service;

use App\Models\Tasks;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TaskService
{
    public function store(array $data)
    {
        DB::beginTransaction();

        try {
            $task = new Tasks();
            $task->title = $data['title'];
            $task->content = $data['content'];
            $task->user_id = $data['user_id'];

            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            if (isset($data['image'])) {
                $data['image'] = Storage::disk('public')->put('/images', $data['image']);
                $task->image = $data['image'];
            } else {
                $task->image = null;
            }

            $task->save();

            $task->tags()->attach($tagIds);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }


    public function update(array $data, Tasks $tasks): Tasks
    {

        try {
            Db::beginTransaction();

            $tasks->title = $data['title'];
            $tasks->content = $data['content'];

            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            if (isset($data['image'])) {
                $tasks->image = Storage::disk('public')->put('/images', $data['image']);
            } else {
                $tasks->image = null;
            }

            $tasks->update();

            if (isset($tagIds)) {
                $tasks->tags()->sync($tagIds);
            }

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }

        return $tasks;
    }
}



