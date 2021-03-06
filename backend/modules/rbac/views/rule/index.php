<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\modules\rbac\models\AuthItemSearch $searchModel
 */
$this->title = 'BizRules';
$this->params['breadcrumbs'][] = $this->title;
$this->render('/layouts/_sidebar');
?>
<div class="role-index">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <p>
        <?php echo Html::a('Create Rule', ['create'], ['class' => 'btn btn-success']); ?>
    </p>

    <?php Pjax::begin(['enablePushState' => false, 'timeout' => 5000]); ?>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'expression:ntext',
            ['class' => 'yii\grid\ActionColumn',],
        ],
    ]);
    ?>

    <?php Pjax::end(); ?>
</div>
