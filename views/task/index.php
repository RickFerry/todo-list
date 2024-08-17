// views/task/index.php
use yii\helpers\Html;

$this->title = 'Minhas Tarefas';
?>

<h1><?= Html::encode($this->title) ?></h1>

<p>
    <?= Html::a('Criar Tarefa', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<p>
    Ordenar por:
    <?= Html::a('Data de Vencimento', ['index', 'sort' => 'due_date'], ['class' => 'btn btn-link']) ?> |
    <?= Html::a('Prioridade', ['index', 'sort' => 'priority'], ['class' => 'btn btn-link']) ?>
</p>

<table class="table table-bordered">
    <thead>
    <tr>
        <th>Título</th>
        <th>Descrição</th>
        <th>Data de Vencimento</th>
        <th>Status</th>
        <th>Prioridade</th>
        <th>Ações</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($tasks as $task): ?>
        <tr>
            <td><?= Html::encode($task->title) ?></td>
            <td><?= Html::encode($task->description) ?></td>
            <td><?= Html::encode($task->due_date) ?></td>
            <td><?= Html::encode($task->status) ?></td>
            <td><?= Html::encode($task->priority) ?></td>
            <td>
                <?= Html::a('Editar', ['update', 'id' => $task->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Excluir', ['delete', 'id' => $task->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Você tem certeza que deseja excluir esta tarefa?',
                        'method' => 'post',
                    ],
                ]) ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>