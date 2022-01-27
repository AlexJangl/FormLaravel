<?php
namespace App\Services\History\Facade;

use Illuminate\Support\Facades\Facade;

class TaskHistoryFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'TaskHistoryService';
    }
}
