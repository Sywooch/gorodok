<?php
use yii\helpers\Url;
use yii\helpers\Html;
use frontend\widgets\Avatar;
use common\widgets\Arrays;

/* @var $this yii\web\View */
/* @var $model common\models\afisha\Afisha */
$ses = Yii::$app->session;
$ses->open();

$parent_cat = $ses->get('parent_cat');
$first_child = $ses->get('first_child');
$ses->close();

$cur_cat = $model['cat'];

if (!empty($model['m_description'])) {
    $this->registerMetaTag(['content' => Html::encode($model['m_description']), 'name' => 'description']);
}
if (!empty($model['m_keyword'])) {
    $this->registerMetaTag(['content' => Html::encode($model['m_keyword']), 'name' => 'keywords']);
}
$this->params['right'] = true;
$this->params['left'] = true;
$this->title = $model['title'];
$this->params['breadcrumbs'][] = ['label' => 'Афиша', 'url' => [Url::to('/afisha/afisha/index')]];
if(!empty($parent_cat)){
    foreach($parent_cat as $cat){
        $this->params['breadcrumbs'][] = ['label' => $cat['name'], 'url' => [Url::to('/afisha/afisha/index'), 'cat'=>$cat['alias']]];
    }
}
$this->params['breadcrumbs'][] = ['label' => $cur_cat['name'], 'url' => [Url::to('/afisha/afisha/index'), 'cat'=>$cur_cat['alias']]];
$this->params['breadcrumbs'][] = $this->title;
$user = Yii::$app->user->getIdentity();
?>
<div class="afisha-view">
    <div class="row">
        <div class="col-sm-12">
            <h1><strong style="font-size: 0.9em; font-style: italic;"><?= $model['title'] ?></strong></h1>
            <p style="margin: 2px 0;">
                <strong class="small-text">Дата:&nbsp;<?= \Yii::$app->formatter->asDate($model['date_in'], 'long') ?></strong>
                <?php if(!empty($model['date_out'])){ ?>
                    &nbsp; - &nbsp;
                    <strong class="small-text"><?= \Yii::$app->formatter->asDate($model['date_out'], 'long') ?></strong>
                <?php } ?>
                <br><span><i class="small-text">Категория:&nbsp;&nbsp;</i><strong><?=Html::a($model['cat']['name'],['/afisha/afisha/index','cat'=>$model['cat']['alias']])?></strong></span><br>
                <span><i class="small-text">Место мероприятия:&nbsp;&nbsp;</i><strong><?= $model['place']['name'] ?></strong></span>
            </p>
            <p><strong><?= $model['subtittle'] ;?></strong></p>
        </div>
    </div>
    <hr style="margin: 0px 0px 15px 0px; border: 2px solid #ddd;">
    <div class="row">
        <div class="col-sm-12">
            <div><?=$model['text']?></div>
        </div>
    </div>


</div>
