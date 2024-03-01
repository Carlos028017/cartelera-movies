<?php
$start_time = microtime(true);

// Make a request to the web page
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://localhost/movies/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

$loading_time = microtime(true) - $start_time;

// Print the loading time
echo "<script>alert('tiempo de ejecucion" . $loading_time ."segundos.');</script>";
