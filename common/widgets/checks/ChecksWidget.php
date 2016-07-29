<?php
/**
 * Created by DENOLL LLC http://denoll.ru.
 * User:  Denis Oleynikov
 * Email: denoll@denoll.ru
 * Date: 06.07.2016
 * Time: 21:45
 */

namespace common\widgets\checks;


use yii\base\Model;
use yii\bootstrap\Html;
use yii\bootstrap\Widget;

/**
 * Class ChecksWidget
 * @package common\widgets\checks
 * @param array $field
 * @param string $header
 */
class ChecksWidget extends Widget
{
	public $field = [ ];
	public $header;

	/**
	 * @return string
	 */
	public function init()
	{
		parent::init();
		$str = '';
		if ( empty($this->field) ) return null;
		$header = !empty($this->header) ? $this->header : '';
		if ( is_array($this->field) && $this->search($this->field) ) {
			$str .= '<table class="table table-striped table-bordered">';
			if ( !empty($header) ) {
				$str .= '<thead><tr><th colspan="2">' . $header . '</th></tr></thead>';
			}
			$str .= '<tbody>';
			foreach ( $this->field as $field ) {
				$type = !empty($field[ 'type' ]) ? $field[ 'type' ] : 'bool';
				$str .= '';
				if ( $type == 'string' ) {
					if ( !empty($field[ 'val' ]) ) {
						$str .= '<tr>';
						$str .= '<td>' . $field[ 'label' ] . '</td>';
						$str .= '<td><strong>&nbsp;' . $field[ 'val' ] . '&nbsp;</strong></td>';
						$str .= '</tr>';
					}
				} else {
					if ( $field[ 'val' ] == 1 ) {
						$str .= '<tr>';
						$str .= '<td>' . $field[ 'label' ] . '</td>';
						$str .= '<td>';
						$str .= '<span class="label label-green">&nbsp;&nbsp;<i class="fa fa-check"></i>&nbsp;&nbsp;</span>';
						$str .= '</td>';
						$str .= '</tr>';
					}
				}
			}
			$str .= '<tbody>';
			$str .= '</table>';
		}
		echo $str;
		return true;
	}

	/**
	 *
	 */
	public function run()
	{
		parent::run(); // TODO: Change the autogenerated stub
	}

	/**
	 * @param $array
	 * @return bool
	 */
	protected function search($array)
	{
		foreach ($array as $item){
			if(!empty($item['val'])) return true;
		}
		return false;
	}


}