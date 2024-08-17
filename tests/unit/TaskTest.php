<?php

namespace unit;
use app\models\Task;
use Codeception\Test\Unit;

class TaskTest extends Unit
{
    public function testCreateTask()
    {
        $task = new Task([
            'title' => 'Test Task',
            'status' => 'pending',
            'user_id' => 1,
        ]);
        $this->assertTrue($task->save());
    }
}
