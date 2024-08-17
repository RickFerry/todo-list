<?php

use yii\db\Migration;

class m230817_000002_create_task_table extends Migration
{
    public function up()
    {
        $this->createTable('task', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text(),
            'due_date' => $this->date(),
            'status' => "ENUM('pending', 'in-progress', 'completed') NOT NULL DEFAULT 'pending'",
            'priority' => $this->integer()->defaultValue(0),
            'user_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('fk_task_user', 'task', 'user_id', 'user', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk_task_user', 'task');
        $this->dropTable('task');
    }
}
