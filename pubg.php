<?php


define('API_KEY', '41f2f139-3f92-4f92-8d44-12f36e215fa5
');
define('END_PONT', 'https://api.pubgtracker.com/v2/search/steam?steam');

$header = ['TRN-Api-Key:' . API_KEY];

// $token_data = [
// 	'card' => [
// 		'name' => $_POST['full-name'],
// 		'number' => $_POST['card-num'],
// 		'exp_month' => $_POST['exp-month'],
// 		'exp_year' => $_POST['exp-year'],
// 		'cvc' => $_POST['cvc'],
// 	]
// ];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, END_PONT);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
//curl_setopt($ch, CURLOPT_POST, true);
// curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($token_data));

$token_response = curl_exec($ch);
$pubg = json_decode($token_response, true);

//var_dump($pubg);
print_r($pubg);
//echo $pubg['nickname'];

?>
<!DOCTYPE html>
<html>
<head>
<body>

</body>
</html>