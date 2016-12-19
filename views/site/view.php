<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Phonebook */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Phonebooks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phonebook-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_phonbook], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_phonbook], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('addnumber', ['addnumber', 'id' => $model->id_phonbook], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_phonbook',
            'name',
            'surname',
            'patronymic',
            'date',
        ],
    ]) ?>
    
     <?= GridView::widget([
        'dataProvider' => $dataProvider,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

         
            'number',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{updatephone}{deletephone}',
                'buttons' => 
            [
            'updatephone' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', 'index.php?r=site%2Fupdatenumber&id='.$model->id_phone, [
                           'title' => Yii::t('app', 'Updatephonenumber'),
                    ]);
                },
            'deletephone' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', 'index.php?r=site%2Fdeletenumber&id='.$model->id_phone, [
                                'title' => Yii::t('app', 'Deletephonenumber'),
                    ]);
                  }
             ],
            ],
      ],
    ]); 
   
    ?>

</div>
