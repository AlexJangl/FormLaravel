<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\TaskHistory;
use App\Services\History\Facade\TaskHistoryFacade;

class HomeController
{
    public function index()
    {
        $taskHistory = TaskHistory::query()->where('task_id',
            $this->changeTableTasksFieldTitle(2, "Fasade test1"))->get();
        return $taskHistory;
    }

    public function changeTableTasksFieldTitle (int $id, string $value)
    {
        $task = Task::query()->where('creator_id', $id)->first();
        $oldValue = json_encode($task);
        $task->title = $value;
        $task->save();
        $newValue = json_encode($task);
        if ($oldValue != $newValue)
        {
            $message[0] = $oldValue;
            $message[1] = $newValue;
            TaskHistoryFacade::add($task->id, $message);
        }
        return $task->id;
    }
}
