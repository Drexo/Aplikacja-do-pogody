<?php

  function getWeather(array $cords) {
    $lat = $cords['lat'];
    $lon = $cords['lon'];
    $url = 'https://api.openweathermap.org/data/2.5/weather?lat=' . $lat . '&lon=' . $lon . '&appid=cf328505e841a8279b0c3610cf053a55';
    
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_URL,"$url");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
    $response = curl_exec($ch);
    $response = json_decode($response);
    curl_close($ch);
    echo json_encode($response);
  }
  
  function getTownCords( string $town) {
    $url = 'https://api.openweathermap.org/geo/1.0/direct?q=' . $town . '&limit=1&appid=cf328505e841a8279b0c3610cf053a55';
    
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_URL,"$url");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
    $response = curl_exec($ch);
    $response = json_decode($response);
    curl_close($ch);
    $cords = array(
      "lat" => $response[0]->lat,
      "lon" => $response[0]->lon,
    );
  
    getWeather($cords);
  }

  getTownCords($_GET['town']);
  ?>