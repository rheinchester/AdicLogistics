<?php 
$url = 'http://www.easysms.com.ng/api/send/';
$fields  = array('from' =>  'Adic.com',
				'to' =>  '07013795190',
				'message' =>  'Hello world',
				'username' =>  'jacob',
				'pword' =>  'palmline',
				'hash' => '349393',
				'formCountry' =>  '234',
				'pword' =>  'AdiLog',
				'sourceinfo' =>  '1'
	);
$fields_string = (http_build_query($fields));


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, count($fields));
curl_setopt($ch, CURLOPT_POSTFIELDS, $url);

$result = curl_exec($ch);

curl_close($ch);

 ?>