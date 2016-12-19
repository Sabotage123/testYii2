<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Phonebook */
$this->title = 'Добавить номер: ' . $idphonebook;
$this->params['breadcrumbs'][] = ['label' => 'Phonebooks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => "номер контакта $idphonebook", 'url' => ['view', 'id' => $idphonebook]];
$this->params['breadcrumbs'][] = 'add';



?>
<div class="phonebook-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formcreatnumber', [
        'model' => $model,
        'id' => $idphonebook,
    ]) ;
   
        ?>
   
    
    

</div>
