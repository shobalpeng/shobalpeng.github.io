<?php
	$channel_id = $_GET['id']; // 1 2 3 
	if(strlen($channel_id)<2) $channel_id = '0'.$channel_id;
	$bstrURL = 'http://em.chinamcloud.com/player/encryptUrl';
	$json = array('url'=>'http://livehyw.chinamcache.com/xjtvs/zb00'.$channel_id.'.m3u8','playType'=>'live','type'=>'cdn','cdnEncrypt'=>'d058c6c09b8cec3e4c8391557ac977714a35da41c4cfd40c75d6b4fdb37750b43af74fce34817cf0f28fdb861cee29c2d38a224f664092fc607624d364573a5bf191b7df418a898adfe4f7daed74bd464c636814747c2b246677746a3cda962610392572de95ce9db9447ce86a2f5f6df3ae1405b07d8a0b94e218d92ddc61345eb64ad9db24c0b38f20d17c3717682f41fad9b9f86009a3ecd06a4f448d26362cbd0ecd8e3358f60737b11e812b54af7c6a88128bdbd250d3a5cd3991f866f4f7f0cf6d6476fac65bfae7abfb0638b08eac0b97e87c8db657a02d6d425e9a319d77c65550d690d3f59972e63eecc5b993deae6c7d9af574802bbe093abc607f7656cb73fdd1afbfd4b23523acba201e523e16446140b74be813b07aae5e1fce3b1263a527e67571be228ef4043746093ffd7ce2f8011f0cebb0934424244ae3','cdnIndex'=>0);
	$json = json_encode($json);
	echo($json);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_URL, $bstrURL);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json;charset=UTF-8')); // 抓包都能得到，关键的点是这个头。
	$data = curl_exec($ch);
	curl_close($ch);
	$obj = json_decode($data);
	header ('location:'.$obj->url);

?>
