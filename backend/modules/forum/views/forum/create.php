<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Forums */

$this->title = 'Новый форум';
$this->params['breadcrumbs'][] = ['label' => 'форумы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="forums-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
