<?php
	//header('Pragma: no-cache');
	header("private");
	//header('Cache-Control: max-age = 0, no-cache');
	$nickname = "이준혁씨";
	$url = "https://lostark.game.onstove.com:443/Profile/Character/".urlencode($nickname);
	$data = array();
	$ch = curl_init();
	

	curl_setopt ($ch, CURLOPT_URL,$url);
	curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
	curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);

	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt ($ch, CURLOPT_BINARYTRANSFER, 1);
	curl_setopt ($ch, CURLOPT_REFERER, "");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);       //POST data
	curl_setopt($ch, CURLOPT_POST, false);

	$result = curl_exec($ch);
	/*$result = str_replace("\"/Content/", "\"https://lostark.game.onstove.com/Content/", $result);
	$result = str_replace("https://lostark.game.onstove.com/Content/Common.PC.js", "/Content/Common.PC.js", $result);*/
	curl_close ($ch);

	echo $result;exit;

	//$patten = "/<th style=\"width:305px; color:#010101; text-align:left; text-indent:20px;\">(.*?)<\/th>/is";
	$patten = "/var _memberNo = \'(.*?)\'/is";
	preg_match_all($patten,$result,$memberno); 
	$patten = "/var _pcId = \'(.*?)\'/is";
	preg_match_all($patten,$result,$pcid); 
	$patten = "/var _worldNo = \'(.*?)\'/is";
	preg_match_all($patten,$result,$worldno); 
	$patten = "/var _pvpLevel = \'(.*?)\'/is";
	preg_match_all($patten,$result,$pvpLevel); 


	$collection_url = "https://lostark.game.onstove.com/Profile/GetCollosseum";	
	$collection_data = array();
	$collection_data["memberNo"] = $memberno[1][0];
	$collection_data["worldNo"] = $worldno[1][0];
	$collection_data["pcId"] = $pcid[1][0];
	$collection_data["pvpLevel"] = $pvpLevel[1][0];
	echo "<xmp>";
	print_r($collection_data);
	echo "</xmp>";
	echo json_encode($collection_data);
	echo "<br>";
	echo mb_strlen(json_encode($collection_data), "utf-8");
	echo "<br>";
	echo mb_strlen(json_encode($collection_data), "euc-kr");
	//exit;
	?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script> 
<script type="text/javascript">
	function profileTabLoad(index) {
	    var method = "";
	    var params = {};
	    var _memberNo = "<?=$collection_data['memberNo']?>";
	    var _worldNo = "<?=$collection_data['worldNo']?>";
	    var _worldNo = "<?=$collection_data['pcId']?>";

	    method = "GetCollection";
	    params = {
	        memberNo: _memberNo,
	        worldNo: _worldNo,
	        pcId: _worldNo,
	    }

	    $.ajax({
	        url: 'https://lostark.game.onstove.com/Profile/' + method,
	        method: "POST",
	        data: params,
	        dataType: 'html',
	        success: function (data) {
	            alert(data);
	        },
	        error: function (xhr, status, error) {
	            /*ajaxErrorHandler(xhr, status, error);
	            return;*/
	        }
	    });
	}
	profileTabLoad();
</script>

	<?php

	//print_r($collection_data);exit;
	$postData = strlen(json_encode($collection_data));
	//echo $postData;exit;
	//echo mb_strlen($postData);exit;
	echo $postData;
#	Result	Protocol	Host	URL	Body	Caching	Content-Type	Process	Comments	Custom	
//97	200	HTTPS	lostark.game.onstove.com	/Profile/GetCollection	48,493	private	text/html; charset=utf-8	chrome:14688			
	#	Result	Protocol	Host	URL	Body	Caching	Content-Type	Process	Comments	Custom	
//96	200	HTTPS	lostark.game.onstove.com	/Profile/GetCollosseum	19,742	private	text/html; charset=utf-8	chrome:14688			




	$ch1 = curl_init();
	$headers = array();
	$headers[] = "Content-Type: text/html; charset=utf-8;";
	$headers[] = "Content-Length: 19742;";
	curl_setopt ($ch1, CURLOPT_URL,$collection_url);
	curl_setopt ($ch1, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt ($ch1, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt ($ch1, CURLOPT_BINARYTRANSFER, 1);
    //curl_setopt($ch1, CURLOPT_HEADER, 1);
	curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers);
	curl_setopt ($ch1, CURLOPT_REFERER, "");
	curl_setopt($ch1, CURLOPT_POSTFIELDS, $collection_data);       //POST data
	curl_setopt($ch1, CURLOPT_POST, true);

	$result = curl_exec($ch1);
	curl_close ($ch1);
	echo $result;


	/*echo "<xmp>";
	print_r($show);
	echo "</xmp>";*/

	//echo "bb".$result."aa";
	exit;

	foreach($_POST as $key => $value) {
		$$key = $value;
	}
	switch($mode) {
		case "search_info":
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

			echo "bb".$result."aa";

			$collection_url = "https://lostark.game.onstove.com/Profile/GetCollection";	
			$collection_data = array();
			$collection_data["memberNo"] = "knHeDoSJOUZLiZkcwOnNMmYqgq9NqTi+a2QEDd9QHXY=";
			$collection_data["worldNo"] = "N5z2w8IJGGv+GHPb0wFL1Q==";
			$collection_data["pcId"] = "U1KpaZxyFt4qMGOegNbqeWwxTVeGDLX+5/LpemTxttU=";
			$collection_data["pvpLevel"] = "1";

		break;
	}
?>