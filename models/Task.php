<?php

namespace app\models;

use yii\db\ActiveRecord;

class Task extends ActiveRecord
{
    public function rules()
    {
        return [
            [['title', 'status', 'user_id'], 'required'],
            [['description'], 'string'],
            [['due_date'], 'date', 'format' => 'php:Y-m-d'],
            [['status'], 'in', 'range' => ['pending', 'in-progress', 'completed']],
            [['priority'], 'integer'],
            [['user_id'], 'exist', 'targetClass' => User::class, 'targetAttribute' => 'id'],
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
