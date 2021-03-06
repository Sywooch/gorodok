<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use common\widgets\DbBanner;

$this->title = 'About';
$this->params[ 'breadcrumbs' ][] = $this->title;
$seo = Yii::$app->seo->getByKey('main_page');
$this->registerMetaTag([ 'content' => $seo->desc, 'name' => 'description' ]);
$this->registerMetaTag([ 'content' => $seo->kw, 'name' => 'keywords' ]);


?>
<div class="site-about">
	<h1><?= Html::encode($this->title) ?></h1>

	<div class="col-sm-2">
		<?= Yii::$app->logo->getLogo() ?>
	</div>
	<div class="col-sm-4">
		<?= \app\widgets\DbText::widget([ 'key' => 'footer_kontacts' ]) ?>
	</div>
	<div class="col-sm-6">

			<?= \common\widgets\menu\MenuListWidget::widget([ 'key' => 'footer_right_menu', 'ulOptions' => ['class'=> 'list-unstyled link-list'] ]) ?>

	</div>
	<div>
		<?= DbBanner::widget([ 'key' => 'banners_main_page_left' ]) ?>
	</div>


</div>
