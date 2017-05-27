<?php

namespace ApplicationBundle\Service;

/**
 * Class LocationFinder
 * @package ApplicationBundle\Service
 */
class LocationFinder
{
    const EXTERNAL_SERVICE_URL = 'ipinfo.io';

    /**
     * @var array
     */
    private $location = [];

    /**
     * @param string $ip
     * @return string
     */
    public function findAddressByIp(string $ip) : string
    {
        // $ip = '92.229.132.6';
        $this->location = $this->requestByIp($ip);
        return $this->__toString();
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        $result[] = $this->location['postal'] ?? '';
        $result[] = $this->location['city'] ?? '';
        $result[] = $this->location['region'] ?? '';
        $result[] = $this->location['country'] ?? '';

        if (!array_filter($result)) {
            $result = [$this->location['ip'] ?? ''];
        }

        return implode(', ', $result);
    }

    /**
     * @param $ip
     * @return array
     */
    private function requestByIp($ip) : array
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::EXTERNAL_SERVICE_URL . '/' . $ip);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }
}