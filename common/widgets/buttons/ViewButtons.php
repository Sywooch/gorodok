<?php
/**
 * Created by DENOLL LLC http://denoll.ru.
 * User:  Denis Oleynikov
 * Email: denoll@denoll.ru
 * Date: 06.07.2016
 * Time: 21:45
 */

namespace common\widgets\buttons;

use yii\bootstrap\Html;
use yii\bootstrap\Widget;
use yii\helpers\Url;

/**
 * Class MainButtons
 * @package common\widgets\
 *
 * @param string $action
 * @param string $update_url
 * @param string $save_url
 * @param string $close_url
 * @param string $delete_url
 */

class ViewButtons extends Widget
{
	public $action = 'action';
	public $update_url = 'update';
	public $save_url = 'index';
	public $close_url = null;
	public $delete_url = 'delete';
	public $id = null;

	public function init()
	{
		parent::init();
		$str = '';
		$str .= Html::beginTag('div', ['class'=>form-group]);
		$str .= Html::submitButton(
			'<i class="fa fa-check"></i>&nbsp;Сохранить',
			[
				'class' => 'btn btn-success',
				'name' => 'action',
				'value' => 'update',
			]
		);
		$str .= Html::submitButton(
			'<i class="fa fa-save"></i>&nbsp;Сохранить и закрыть',
			[
				'class' => 'btn btn-primary',
				'name' => 'action',
				'value' => 'save',
			]
		);
		$str .= Html::a(
			'<i class="fa fa-close"></i>&nbsp;Закрыть без сохранения',
			[
				$this->close_url ? $this->close_url : Url::previous()
			],
			[
				'class' => 'btn btn-default',
			]
		);
		$str .= Html::a(
			'<i class="fa fa-trash"></i>&nbsp;Удалить',
			[
				$this->delete_url, 'id' => $this->id
			],
			[
				'class' => 'btn btn-danger',
				'data' => [
					'confirm' => 'Вы действительно хотите удалить этот элемент?',
					'method' => 'post',
				],
			]
		);
		$str .= Html::endTag('div');

		echo $str;
	}

	public function run()
	{
		parent::run(); // TODO: Change the autogenerated stub
	}
}