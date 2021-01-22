<?php


class Weather
{
    public $city = [];
    private $api_url = 'http://api.openweathermap.org/data/2.5/weather?q=%s,&appid=b56bb0e40b64770ab1b6b1d1eb25bf4f';

    /**
     * Weather constructor.
     * @param $city
     */
    public function __construct($city)
    {

        if (is_array($city)) {
            foreach ($city as $item) {
                $this->city[$item] = $item;
            }
        } else {

            $this->city = $city;
        }
        var_dump( $this);
    }

    /**
     * @param $this ->city
     * @return mixed
     */
    public function getData()
    {

        if (is_array($this->city)) {
            $weather = [];
            foreach ($this->city as $item) {
                $city_weather = $this->getApiContent($item);
                $temperatureCelciy = $this->convertTemperature($city_weather['main']['temp'], 273.15);

                $windSpeed = round($city_weather['wind']['speed']);
                $weather[$item] = $city_weather['weather']['0']['description'] . '. The temperature is ' . $temperatureCelciy . ' °С' . '. Скорость ветра ' . $windSpeed . ' м/с';
            }
        } else {
            $city_weather = $this->getApiContent($this->city);
            $temperatureCelciy = $this->convertTemperature($city_weather['main']['temp'], 273.15);
            $windSpeed = round($city_weather['wind']['speed']);
            $weather = $city_weather['weather']['0']['description'] . '. The temperature is ' . $temperatureCelciy . ' °С' . '. Скорость ветра ' . $windSpeed . ' м/с';
        }


        return $weather;

    }

    /**
     * @param string $city
     * @return false|string
     */
    private function getApiContent(string $city)
    {
        if ($content = file_get_contents(sprintf($this->api_url, $city))) {
            return json_decode($content, true);
        }
        return false;

    }

    /**
     * @param float $kelvinTemp you can set temperature in Kelvin
     * @param float $difference coefficient
     */
    private function convertTemperature(float $kelvinTemp, float $difference)
    {

        return round($kelvinTemp - $difference);
    }


}