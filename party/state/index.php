<?php
	foreach($_POST as $key=>$value) {
		$$key = $value;		
	}
	switch($mode) {
		case "info":
			$url = "https://lostark.game.onstove.com/Profile/Character/".urlencode($name);
			$data = array();
			$ch = curl_init();
			curl_setopt ($ch, CURLOPT_URL,$url);
			curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt ($ch, CURLOPT_BINARYTRANSFER, 1);
			curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
			curl_setopt ($ch, CURLOPT_REFERER, "");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);       //POST data
			curl_setopt($ch, CURLOPT_POST, false);

			$result = curl_exec($ch);
			curl_close ($ch);


			//우선 전 서버 모든 캐릭 정보 가져옴
			$patten = "/<strong class=\"profile-character-list__server\">@(.*?)<\/strong>/is";
			preg_match_all($patten,$result,$server); 


			$server_arr = array();
			$char_arr = array();
			for($i=0; $i<count($server[1]); $i++) {	//서버별로 갯수만큼 반복
				$server_arr[$i]  = $server[1][$i];

				$patten = "/<ul class=\"profile-character-list__char\">(.*?)<\/ul>/is";
				preg_match_all($patten, $result, $server_char);

				/*echo "<xmp>";
				print_r($server_char[1]);
				echo "</xmp>";
				exit;*/

				$temp_arr = array();

				for($j=0; $j<count($server_char[1]); $j++) {	//서버별 캐릭 발라내기
					$patten = "/<button type=\"button\" onclick=\"location.href=\'\/Profile\/Character\/(.*?)\'\">/is";
					preg_match_all($patten, $server_char[1][$j], $char);
					
					$temp_arr[] = $char[1];
				}
				
			}
			//발라논 닉네임 서버랑 매칭
			for($k=0; $k<count($server_arr); $k++) {
				for($l=0; $l<count($temp_arr[$k]); $l++) {
					$char_arr[$server_arr[$k]][] = $temp_arr[$k][$l];
				}
			}

			echo "<xmp>";
			print_r($char_arr);
			echo "</xmp>";

		break;
	}
?>


<?
/*
배열 몇번짼지 확인
$array=array("aa","bb","cc");
$src="cc";
echo array_search ($src, $array);
*/
?>

