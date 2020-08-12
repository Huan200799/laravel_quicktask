<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'vp_tasks';
    protected $primaryKey = 'task_id';
    protected $guarded = [];
}
