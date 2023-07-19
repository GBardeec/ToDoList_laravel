<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tasks extends Model
{
    use HasFactory;

    protected $table = 'tasks';
    protected $guarded = false;


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tasks_tags', 'tasks_id', 'tag_id');
    }
}
