<?php

$current = file_get_contents("https://api.uphold.com/v0/ticker/USD");
$data = json_decode($current, TRUE);

$priceBTC = 0;

foreach ($data as $key => $value) {
  foreach ($value as $keyCurrency => $valueCurrency) {
    if($valueCurrency == "BTCUSD" ){
      $priceBTC =  ($value["ask"] + $value["bid"]) / 2;
    }
  }
}

header('content-type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
echo json_encode($priceBTC);
if($priceBTC > (692.36 + 1.5)){
  echo "Debes retirar lo que invertiste";
};
if($priceBTC > (695.18 + 1.5)){
  echo "Debes retirar lo que invertiste";
};

?>
