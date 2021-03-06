<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\goods\GoodsSearch */
/* @var $form yii\widgets\ActiveForm */
$get_search = Yii::$app->request->get('search');
$get = !empty($get_search) ? $get_search : null;
$get_cat = Yii::$app->request->get('cat');

?>
<?php $form = ActiveForm::begin([
	'action' => empty($get_cat) ? ['index'] : ['index', 'cat' => $get_cat],
	'method' => 'get',
	'id' => 'search',
]); ?>
<style type="text/css">
	.help-block {
		margin: 0px !important;
	}

	.form-control {
		height: 35px;
	}
</style>
<div class="filter">
	<div class="filter_element col-md-12 side_left" style="margin-top: 5px;">
		<div class="input-group">
			<?= Html::input('text','search',$get,['placeholder'=>'Введите информацию для поиска ...', 'class'=>'form-control']) ?>
			<span class="input-group-btn"><?= Html::submitButton('<i class="fa fa-search"></i>&nbsp;&nbsp;Найти', ['class' => 'btn-u']) ?></span>
		</div>
	</div>
</div>
<?php ActiveForm::end(); ?>