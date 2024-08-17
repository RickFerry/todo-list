<?php

namespace app\controllers;

use Yii;
use app\models\Task;
use yii\db\Exception;
use yii\db\StaleObjectException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\web\Response;

class TaskController extends Controller
{
    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex($sort = null): string
    {
        $query = Task::find()->where(['user_id' => Yii::$app->user->id]);

        if ($sort === 'due_date') {
            $query->orderBy(['due_date' => SORT_ASC]);
        } elseif ($sort === 'priority') {
            $query->orderBy(['priority' => SORT_DESC]);
        }

        $tasks = Task::find()->all();
        return $this->render('index', [
            'tasks' => $tasks,
        ]);
    }

    public function actionCreate()
    {
        $task = new Task();
        if ($task->load(Yii::$app->request->post()) && $task->save()) {
            Yii::$app->session->setFlash('success', 'Tarefa criada com sucesso.');
            return $this->redirect(['index']);
        }
        return $this->render('create', ['task' => $task]);
    }

    /**
     * @throws Exception
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $task = $this->findModel($id);
        if ($task->load(Yii::$app->request->post()) && $task->save()) {
            Yii::$app->session->setFlash('success', 'Tarefa atualizada com sucesso.');
            return $this->redirect(['index']);
        }
        return $this->render('update', ['task' => $task]);
    }

    /**
     * @throws \Throwable
     * @throws StaleObjectException
     * @throws NotFoundHttpException
     */
    public function actionDelete($id): Response
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', 'Tarefa excluída com sucesso.');
        return $this->redirect(['index']);
    }

    protected function findModel($id): ?Task
    {
        if (($model = Task::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('A tarefa solicitada não existe.');
    }
}
