<?php

namespace backend\modules\users\helpers;

use Yii;
use yii\base\Component;
use linslin\yii2\curl\Curl;

/**
 * Wrapper of service offers a REST API allowing to get a visitor IP address and to query location information
 * from any IP address.
 * @see http://www.telize.com/
 * @author Vasilij Belosludcev http://mihaly4.ru
 * @since 1.0.0
 */
class GeoIp extends Component
{
    /**
     * URL of API methods.
     */
    const URL_API = 'http://www.telize.com/';

    /**
     * @var boolean Whether set `true` then IP address of visitor will be get via API.
     * Else, via \yii\web\Request::$userIP.
     */
    public $externalIp = false;

    /**
     * Returned information by IP address with following paramters:
     * - `ip`               - Visitor IP address, or IP address specified as parameter.
     * - `country_code`     - Two-letter ISO 3166-1 alpha-2 country code.
     * - `country_code3`    - Three-letter ISO 3166-1 alpha-3 country code.
     * - `country`          - Name of the country.
     * - `region_code`      - Two-letter ISO-3166-2 state / region code.
     * - `region`           - Name of the region.
     * - `city`             - Name of the city.
     * - `postal_code`      - Postal code / Zip code.
     * - `continent_code`   - Two-letter continent code.
     * - `latitude`         - Latitude.
     * - `longitude`        - Longitude.
     * - `dma_code`         - DMA Code.
     * - `area_code`        - Area Code.
     * - `asn`              - Autonomous System Number.
     * - `isp`              - Internet service provider.
     * - `timezone`         - Time Zone.
     *
     * @param string $ip IP address of visitor. If not set will be uses current IP address.
     * @return array|false
     */
    public function getInfo($ip = null)
    {
        if ($ip === null) {
            if (!$this->externalIp) {
                $ip = Yii::$app->request->userIP;
            }
        }
        $curl = new Curl;
        if ($curl->get(self::URL_API . 'geoip/' . $ip)) {
	        $response = json_decode($curl->response, true);
            if (empty($response['ip'])) {
	            print_r($response);
                return false;
            }
            return $response;
        }
        return false;
    }

    /**
     * Returned IP address of visitor if successful.
     * @return string|false
     */
    public function getIp()
    {
        $curl = new Curl;
        if ($curl->get(self::URL_API . 'jsonip')) {
	        $response = json_decode($curl->response, true);
            if (empty($response)) {
                return false;
            }
            return $response['ip'];
        }
        return false;
    }
}

