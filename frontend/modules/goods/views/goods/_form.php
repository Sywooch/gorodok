<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use common\widgets\Arrays;
use kartik\tree\TreeViewInput;
use common\models\goods\GoodsCat;
use bupy7\cropbox\Cropbox;
use yii\captcha\Captcha;
use yii\web\View;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model common\models\goods\Goods */
/* @var $form yii\widgets\ActiveForm */
$this->params['left'] = true;
$label = \app\helpers\Texts::TEXT_CORRECT_IMAGE;

?>

<div class="goods-form row">
	<?php Pjax::begin(); ?>
	<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
	<div class="col-sm-6 side_left">
		<?= $form->field($model, 'id_cat')->widget(TreeViewInput::classname(), [
			'query' => GoodsCat::find()->addOrderBy('root, lft'),
			'headingOptions' => ['label' => 'Укажите категорию'],
			//'name' => 'cat_list', //'Goods[id_cat]',    // input name
			'value' => true, //$model->isNewRecord ? '' : $model->id_cat,
			'rootOptions' => ['label' => '<span class="text-primary">Кореневая директория</span>'],
			'options' => [
				'placeholder' => 'выберите категорию для товара...',
				'disabled' => false
			],
			'fontAwesome' => true,     // optional
			'asDropdown' => true,            // will render the tree input widget as a dropdown.
			'multiple' => false,            // set to false if you do not need multiple selection
		])->label('Выберите категорию (Выбирать можно только конечные категории помеченные синими иконками).'); ?>
	</div>
	<div class="col-sm-6">
		<?= $form->field($model, 'image')->widget(Cropbox::className(), [
			'attributeCropInfo' => 'crop_info',
			'optionsCropbox' => [
				'boxWidth' => Arrays::IMG_SIZE_WIDTH,
				'boxHeight' => Arrays::IMG_SIZE_HEIGHT,
				'cropSettings' => [
					[
						'width' => Arrays::IMG_SIZE_WIDTH,
						'height' => Arrays::IMG_SIZE_HEIGHT,
					],
				],
			],
			'previewUrl' => [
				Yii::getAlias('@frt_url/img/goods/') . $model['main_img']
			],
		])->label($label); ?>
	</div>
	<div class="col-sm-8">
		<?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Укажите название товара'); ?>
	</div>
	<div class="col-sm-4">
		<?= $form->field($model, 'cost')->textInput(['maxlength' => true])->label('Цена (руб).'); ?>
	</div>
	<div class="col-sm-12">
		<?= $form->field($model, 'description')->textarea(['rows' => 6, 'maxlength' => true])->label('Описание товара (макс. 500 символов).'); ?>
	</div>
	<div class="col-md-5">
		<?php if ($model->isNewRecord) { ?>
			<?= $form->field($model, 'reCaptcha')->widget(
				\himiklab\yii2\recaptcha\ReCaptcha::className()
			) ?>
		<?php } ?>
	</div>
	<div class="col-md-7">
		<div class="tag-box tag-box-v4">
			<?= app\widgets\DbText::widget(['key' => 'text_polzovatelskoe_soglashenie']) ?>
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Сохранить объявление' : 'Сохранить изменения', ['class' => $model->isNewRecord ? 'btn btn-block btn-success' : 'btn btn-block btn-primary']) ?>
		</div>
	</div>
	<?php ActiveForm::end(); ?>
	<?php Pjax::end(); ?>
</div>

<?php

$js = <<< JS
    $("#w1-tree").treeview("collapseAll");
JS;
$this->registerJs($js, View::POS_END);
?>
