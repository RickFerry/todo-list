<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Registrar';
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="site-signup">
    <p>Por favor, preencha os seguintes campos para registrar-se:</p>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'password_repeat')->passwordInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Registrar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
