<?php
/**
 * Created by DENOLL LLC http://denoll.ru.
 * User: Denis Oleynikov
 * Email: denoll@denoll.ru
 * Date: 16.09.2016
 * Time: 11:55
 */

namespace common\models\schedule;


use common\models\Api;
use yii\base\Model;

class Schedule extends Model
{
	public function init()
	{
		parent::init(); // TODO: Change the autogenerated stub
	}

	/**
	 * Расписание по станции
	 * @param $station
	 * @param $date
	 * @param $transport_types
	 * @param string $event
	 * @param $direction
	 * @param int $page
	 * @return mixed
	 */
	public function setRequest($station, $date, $transport_types, $event = null, $direction = null, $page = 1){
		$url = 'https://api.rasp.yandex.net/v1.0/schedule/?';
		$key = Api::findOne($key = 'schedule_key');
		$format = 'json';
		$full_url = $url . 'apikey='.$key->value;
		$full_url .= '&format='.$format;
		$full_url .= '&station='.$station;
		$full_url .= '&lang=ru';
		$full_url .= '&date='.$date;
		$full_url .= '&transport_types='.$transport_types;
		if($event != null){
			$full_url .= '&event='.$event;
		}
		$full_url .= '&system=yandex';
		if($direction != null){
			$full_url .= '&direction='.$direction;
		}
		$full_url .= '&page='.$page;
		$data = \Yii::$app->cache->get($full_url);
		if(!$data){
			$ch = curl_init();
			curl_setopt ($ch, CURLOPT_URL, $full_url);
			curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, TRUE);
			$result = curl_exec ($ch);
			curl_close($ch);
			\Yii::$app->cache->set($full_url, $result, 3600);
			$data = $result;
		}
		return $data;
	}

	/**
	 * Список ближайших станций
	 * @param $transport_types
	 * @param null $lon
	 * @param null $lat
	 * @param int $distance
	 * @param int $page
	 * @return mixed
	 */
	public function setNearestStations($transport_types, $lat = null, $lon = null, $distance = 50, $page = 1){
		$url = 'https://api.rasp.yandex.net/v1.0/nearest_stations/?';

		$key = Api::findOne(['key'=> 'schedule_key']);
		if($lat == null){
			$lat = Api::findOne(['key'=>'lat']);
		}
		if($lon == null){
			$lon = Api::findOne(['key'=>'lon']);
		}
		$format = 'json';
		$full_url = $url . 'apikey='.$key->value;
		$full_url .= '&format='.$format;
		$full_url .= '&lat='.$lat->value;
		$full_url .= '&lng='.$lon->value;
		$full_url .= '&distance='.$distance;
		$full_url .= '&lang=ru';
		//$full_url .= '&station_type='.$station_type;
		$full_url .= '&transport_types='.$transport_types;
		$full_url .= '&page='.$page;
		$data = \Yii::$app->cache->get($full_url);
		if(!$data) {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $full_url);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$result = curl_exec($ch);
			curl_close($ch);
			\Yii::$app->cache->set($full_url, $result, 43200);
			$data = $result;
		}
		return $data;
	}

	/**
	 * Список станций следования
	 * @param $uid
	 * @param $date
	 * @return mixed
	 */
	public function setTreadStations($uid, $date){
		$url = 'https://api.rasp.yandex.net/v1.0/thread/?';

		$key = Api::findOne(['key'=> 'schedule_key']);
		$format = 'json';
		$full_url = $url . 'apikey='.$key->value;
		$full_url .= '&format='.$format;
		$full_url .= '&uid='.$uid;
		$full_url .= '&lang=ru';
		$full_url .= '&date='.$date;
		$full_url .= '&show_systems=all';
		$data = \Yii::$app->cache->get($full_url);
		if(!$data) {
		$ch = curl_init();
		curl_setopt ($ch, CURLOPT_URL, $full_url);
		curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, TRUE);
		$result = curl_exec ($ch);
		curl_close($ch);
		\Yii::$app->cache->set($full_url, $result, 43200);
		$data = $result;
		}
		return $data;
	}

	/**
	 * Копирайт
	 * @return array
	 */
	public function copyright(){
		$url = 'https://api.rasp.yandex.net/v1.0/copyright/?';
		$key = Api::findOne(['key'=> 'schedule_key']);
		$format = 'json';
		$full_url = $url . 'apikey='.$key->value;
		$full_url .= '&format='.$format;
		$data = \Yii::$app->cache->get($full_url);
		if(!$data) {
			$ch = curl_init();
			curl_setopt ($ch, CURLOPT_URL, $full_url);
			curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, TRUE);
			$result = curl_exec ($ch);
			curl_close($ch);
			\Yii::$app->cache->set($full_url, $result, 43200);
			$data = $result;
		}
		return json_decode($data, true);
	}

	/**
	 * @param $transportKey
	 * @return mixed
	 */
	public function getTransportType($transportKey){
		$transport = $this->transportTypes();
		return $transport[$transportKey];
	}

	/**
	 * @return array
	 */
	public function transportTypes(){
		return [
			'plane' => 'Самолет',
			'train' => 'Поезд',
			'suburban' => 'Электричка',
			'bus' => 'Автобус',
		];
	}
}