<?php
	foreach($_POST as $key => $value) {
		$$key = $value;
	}
	switch($mode) {
		case "search_info":
			include "../../snoopy/Snoopy.class.php";

			//닉네임 받아와서 키값으로 가공
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

			$patten = "/<img class=\"profile-character-info__img\" src=\"(.*?)\"/is";
			preg_match_all($patten,$result,$job); 

			$job_img = $job[1][0];
			switch($job_img) {
				case "https://cdn-lostark.game.onstove.com/2018/obt/assets/images/common/thumb/emblem_gunslinger.png":
					$job = "건슬링어";
				break;
			}


			$patten = "/var _memberNo = \'(.*?)\'/is";
			preg_match_all($patten,$result,$memberno); 
			$patten = "/var _pcId = \'(.*?)\'/is";
			preg_match_all($patten,$result,$pcid); 
			$patten = "/var _worldNo = \'(.*?)\'/is";
			preg_match_all($patten,$result,$worldno); 
			$patten = "/var _pvpLevel = \'(.*?)\'/is";
			preg_match_all($patten,$result,$pvpLevel); 

			//가공한 데이터, 수집품 파싱
			$collection_url = "https://lostark.game.onstove.com/Profile/GetCollection";	
			$collection_data = array();
			$collection_data["memberNo"] = "knHeDoSJOUZLiZkcwOnNMmYqgq9NqTi+a2QEDd9QHXY=";
			$collection_data["worldNo"] = "N5z2w8IJGGv+GHPb0wFL1Q==";
			$collection_data["pcId"] = "U1KpaZxyFt4qMGOegNbqeWwxTVeGDLX+5/LpemTxttU=";
			$collection_data["pvpLevel"] = "1";

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





			//섬의 마음
			$pasing_arr = explode("<span class=\"now-count\">", $result);
			$pasing_arr = explode("</span>", $pasing_arr[1]);
			$island_total = $pasing_arr[0];

			$is_collection = explode("<ul class=\"list\">", $result);
			$is_collection = explode("</ul>", $is_collection[1]);

			$out = "";
			$out .= "<div class=\"row events-header\">";
        	$out .= "<div class=\"column\">";
        	$out .= "<h2 class=\"subhead\">Island Mind.</h2>";
        	$out .= "</div>";
        	$out .= "</div>";
        	$out .= "<div class=\"row block-large-1-2 block-900-full events-list\">";
			$out .= "<div class=\"column events-list__item\">";
			$out .= "<h3 class=\"display-1 events-list__item-title\">섬의마음 총 갯수 ".$island_total."</h3>";
			$out .= "<p>";
			$out .= $is_collection[0];
			$out .= "</p>";
			$out .= "</div>";
			$out .= "</div>";

			echo $out;


			//<span class="max-count">94
			echo $island_mind;
			/*echo "<xmp>";
			print_r($pasing_arr);
			echo "</xmp>";*/


		break;
	}
?>