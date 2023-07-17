<?php
$source = $_GET['source'];
$target = $_GET['target'];
$amount = $_GET['amount'];


$exchange = geteExchange($source,$target);
$exchangeAmount = round($amount*$exchange, 2);

$result = array(
    "msg" => "success",
    "amount" => number_format($exchangeAmount)
);

echo json_encode($result);


function geteExchange($source,$target){
	switch ($source) {
		case 'TWD':
			switch ($target) {
				case 'TWD':
					$rate = 1;
					break;
				case 'JPY':
					$rate = 3.669;
					break;
				case 'USD':
					$rate = 0.03281;
					break;
			}
			break;
		case 'JPY':
			switch ($target) {
				case 'TWD':
					$rate = 0.26956;
					break;
				case 'JPY':
					$rate = 1;
					break;
				case 'USD':
					$rate = 0.00885;
					break;
			}
			break;
		case 'USD':
			switch ($target) {
				case 'TWD':
					$rate = 30.444;
					break;
				case 'JPY':
					$rate = 111.801;
					break;
				case 'USD':
					$rate = 1;
					break;
			}
			break;
	}
	return $rate;
}
?>