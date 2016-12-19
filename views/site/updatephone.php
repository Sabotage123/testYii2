<?php


use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Phonebook */
$this->title = 'Update Phonenumber: ' . $model->number;
$this->params['breadcrumbs'][] = ['label' => 'Phonebooks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $name, 'url' => ['view', 'id' => $model->id_phonbook]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="phonebook-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formphone', [
        'model' => $model,
    ]) ?>

</div>