<?php

namespace app\modules\slider;

use app\modules\rbac\components\AccessControl;

class module extends \yii\base\Module
{
	public $controllerNamespace = 'app\modules\slider\controllers';

	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'denyCallback' => function ($rule, $action) {
					return $action->controller->redirect(\Yii::getAlias('@frt_url'));
				},
				'rules' => [
					[
						'allow' => true,
						'roles' => ['admin'],
					],
				],
			],
		];
	}

	public function init()
	{
		parent::init();

		// custom initialization code goes here
	}
}
