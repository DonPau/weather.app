<?php
error_reporting(E_ALL);
  $weather = "";

  if (isset($_GET['city'])) {

    $urlContent = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q='.$_GET['city'].',&appid=b56bb0e40b64770ab1b6b1d1eb25bf4f');

    $forcastArray = json_decode($urlContent, true);
    print_r($forcastArray);

    $weather = $forcastArray['weather']['0']['description'];
    $temperatureKelvin = $forcastArray['main']['temp'];
    $konvertSum = 273.15;
    $temperatureCelciy = $temperatureKelvin - $konvertSum;

    $windSpeed = $forcastArray['wind']['speed'];

    $weather = $weather.'. The temperature is '.round($temperatureCelciy).' °С'.'. Скорость ветра '.round($windSpeed).' м/с';



  }



?>