<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput()->label('Введите имя'); ?>
    <?= $form->field($model, 'lastname')->textInput()->label('Введите Фамилию'); ?>
    <?= $form->field($model, 'nickname')->textInput()->label('Введите LOGIN/NICKNAME'); ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'steamid') ?>
    <?= $form->field($model, 'country')->dropDownList([
        'rus' => 'Россия',
        'uk' => 'Украина',
        'bel' => 'Белоруссия',
        'europ'=>'Другие страны'
    ],
    [
        'prompt' => 'Выберите один вариант'
    ]); ?>
    <?= $form->field($model, 'password')->passwordInput()->hint('Длинна пароля не меньше 10 символов.'); ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>
