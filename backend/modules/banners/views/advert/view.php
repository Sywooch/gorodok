<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\banners\BannerAdv */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Рекламные компании', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner-adv-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить эту рекламную компанию?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'status:boolean',
            'name',
            'click_price',
            'day_price',
            'description:raw',
        ],
    ]) ?>

</div>
