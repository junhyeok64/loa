<?php
	include "../../snoopy/Snoopy.class.php";

	$nickname = "이준혁씨";
	$url = "https://lostark.game.onstove.com/Profile/Character/".urlencode($nickname);
	$data = array();
	$ch = curl_init();
	curl_setopt ($ch, CURLOPT_URL,$url);
	curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt ($ch, CURLOPT_BINARYTRANSFER, 1);
	curl_setopt ($ch, CURLOPT_REFERER, "");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);       //POST data
	curl_setopt($ch, CURLOPT_POST, false);

	$result = curl_exec($ch);
	curl_close ($ch);

	//echo $result;exit;

	//$patten = "/<th style=\"width:305px; color:#010101; text-align:left; text-indent:20px;\">(.*?)<\/th>/is";
	$patten = "/var _memberNo = \'(.*?)\'/is";
	preg_match_all($patten,$result,$memberno); 
	$patten = "/var _pcId = \'(.*?)\'/is";
	preg_match_all($patten,$result,$pcid); 
	$patten = "/var _worldNo = \'(.*?)\'/is";
	preg_match_all($patten,$result,$worldno); 
	$patten = "/var _pvpLevel = \'(.*?)\'/is";
	preg_match_all($patten,$result,$pvpLevel); 


	$collection_url = "https://lostark.game.onstove.com/Profile/GetCollection";	
	$collection_data = array();
	$collection_data["memberNo"] = $memberno[1][0];
	$collection_data["worldNo"] = $worldno[1][0];
	$collection_data["pcId"] = $pcid[1][0];
	//$collection_data["pvpLevel"] = $pvpLevel[1][0];


	$url = "";

	$ss = new Snoopy;

	$ss->httpmethod = "POST";
	$ss->submit($collection_url, $collection_data);
	$result = $ss->results;

	echo $result;
?>