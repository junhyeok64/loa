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
			curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
			curl_setopt ($ch, CURLOPT_REFERER, "");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);       //POST data
			curl_setopt($ch, CURLOPT_POST, false);

			$result = curl_exec($ch);
			curl_close ($ch);
			//echo $result;

			$patten = "/<img class=\"profile-character-info__img\" src=\"(.*?)\"/is";
			preg_match_all($patten,$result,$job); 

			$job_img = $job[1][0];
			$job = $background_img = $character_img = "";

			switch($job_img) {
				case "https://cdn-lostark.game.onstove.com/2018/obt/assets/images/common/thumb/emblem_berserker.png":
					$job = "버서커";
					$character_img = "<img src=\"https://cdn-lostark.game.onstove.com/2018/obt/assets/images/pc/profile/berserker.png\">";
				break;
				case "https://cdn-lostark.game.onstove.com/2018/obt/assets/images/common/thumb/emblem_warlord.png":
					$job = "워로드";
					$character_img = "<img src=\"https://cdn-lostark.game.onstove.com/2018/obt/assets/images/pc/profile/warlord.png\">";
				break;
				case "https://cdn-lostark.game.onstove.com/2018/obt/assets/images/common/thumb/emblem_destroyer.png":
					$job = "디스트로이어";
					$character_img = "<img src=\"https://cdn-lostark.game.onstove.com/2018/obt/assets/images/pc/profile/destroyer.png\">";
				break;
				case "https://cdn-lostark.game.onstove.com/2018/obt/assets/images/common/thumb/emblem_holyknight.png":
					$job = "홀리나이트";
					$character_img = "<img src=\"https://cdn-lostark.game.onstove.com/2018/obt/assets/images/pc/profile/holyknight.png\">";
				break;

				case "https://cdn-lostark.game.onstove.com/2018/obt/assets/images/common/thumb/emblem_gunslinger.png":
					$job = "건슬링어";
					$background_img = "images/character/img_index_v4.jpg";
					$character_img = "<img src=\"images/character_img/gunslinger.png\">";
				break;
				case "https://cdn-lostark.game.onstove.com/2018/obt/assets/images/common/thumb/emblem_striker.png":
					$job = "스트라이커";
					$background_img = "images/character/img_index_v5.jpg";
				break;
				case "https://cdn-lostark.game.onstove.com/2018/obt/assets/images/common/thumb/emblem_bard.png":
					$job = "바드";
					$character_img = "<img src=\"https://cdn-lostark.game.onstove.com/2018/obt/assets/images/pc/profile/bard.png\">";
					$background_img = "images/character/bard.jpg";
				break;
				default:
					$background_img = "images/character/img_index_v2.jpg";
				break;
			}
			//profile-character-info__server
			$server = "";
			$patten = "/<span class=\"profile-character-info__server\" title=\"(.*?)\">/is";
			preg_match_all($patten,$result,$server); 
			$server = str_replace("@", "", $server[1][0]);
			//특성
			//profile-ability-basic
			$patten = "/<div class=\"profile-ability-basic\">(.*?)<div class=\"profile-ability-battle\">/is";
			preg_match_all($patten,$result,$property); 
			$property = addslashes($property[1][0]);
			$property = str_replace("\n", "", $property);
			$property = str_replace("\r", "", $property);
			$property = str_replace("\r", "", $property);
			//$property = str_replace("<li>        <span>공격력", "<li class=\"property_li\"><span>공격력", $property);
			$property = "<div>".$property;

			$ability = "";

			$patten = "/<div class=\"profile-ability-battle\">(.*?)<div class=\"profile-ability-engrave\">/is";
			preg_match_all($patten,$result,$ability); 
			$ability = addslashes($ability[1][0]);
			$ability = str_replace("\n", "", $ability);
			$ability = str_replace("\r", "", $ability);
			$ability = "<div>".$ability;

			//item_grade
			$pattem = "/<div class=\"slot1\" data-grade=\"(.*?)\"/is";
			preg_match_all($pattem,$result,$item_grade);
			$item_grade = $item_grade[1][0];

			//item_code
			$pattem = "/<div class=\"slot1\" data-grade=\"".$item_grade."\" data-item=\"(.*?)_001\">/is";
			preg_match_all($pattem,$result,$item_code);
			$item_code = $item_code[1][0];

			//item_img
			$item_img = array();
			for($i=1; $i<=12; $i++) {
				$data_grade = 4;
				switch($i) {
					case "2":
						$patten_item = "05";
					break;
					case "6":
						$patten_item = "00";
					break;
					case "1":
						$patten_item = ($i<10) ? "0".$i : $i;
					break;
					default:
						$patten_item = (($i-1)<10) ? "0".($i-1) : ($i-1);
					break;
				}
				if($i == 12) {
					$data_grade = 3;
				}
				$patten = "/<div class=\"slot".$i."\" data-grade=\"(.*?)\"/is";
				preg_match_all($patten,$result,$item_greade);
				$item_greade = $item_greade[1][0];


				$patten_item = $item_code."_0".$patten_item;
				$patten = "/<div class=\"slot".$i."\" data-grade=\"".$item_greade."\" data-item=\"".$patten_item."\"><img src=\"(.*?)\" alt=\"\"><\/div>/is";
				preg_match_all($patten,$result,$item_arr);
				$item_img[$i] = $item_arr[1][0];
			}

			//각인
			$_engrave = explode("<h4>각인 효과</h4>", $result);
			$engrave = explode("<div class=\"swiper-option\">", $_engrave[1]);
			$engrave = str_replace("<div class=\"swiper-container\">", "", $engrave[0]);
			$engrave = str_replace("\r", "", $engrave);
			$engrave = str_replace("\n", "", $engrave);
			

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

			//echo $result;exit;

			$coll_arr = array();
            $coll_arr[0]["name"] = "island";
            $coll_arr[0]["name_kr"] = "섬의 마음";
            $coll_arr[0]["num"] = 1;

            $coll_arr[1]["name"] = "star";
            $coll_arr[1]["name_kr"] = "오르페우스의 별";
            $coll_arr[1]["num"] = 2;

            $coll_arr[2]["name"] = "heart";
            $coll_arr[2]["name_kr"] = "거인의 심장";
            $coll_arr[2]["num"] = 3;

            $coll_arr[3]["name"] = "art";
            $coll_arr[3]["name_kr"] = "위대한 미술품";
            $coll_arr[3]["num"] = 4;

            $coll_arr[4]["name"] = "seed";
            $coll_arr[4]["name_kr"] = "모코코 씨앗";
            $coll_arr[4]["num"] = 5;

            $coll_arr[5]["name"] = "tour";
            $coll_arr[5]["name_kr"] = "항해 모험물";
            $coll_arr[5]["num"] = 6;

            $coll_arr[6]["name"] = "token";
            $coll_arr[6]["name_kr"] = "이그네아의 증표";
            $coll_arr[6]["num"] = 7;

            $coll_arr[7]["name"] = "leaf";
            $coll_arr[7]["name_kr"] = "세계수의 잎";
            $coll_arr[7]["num"] = 8;

			$out .= "<script type=\"text/javascript\">";
			

			for($coll_cnt=0; $coll_cnt<count($coll_arr); $coll_cnt++) {
				//섬의 마음
				$pasing_arr = explode("<span class=\"now-count\">", $result);
				$pasing_arr = explode("</span>", $pasing_arr[$coll_arr[$coll_cnt]["num"]]);
				${$coll_arr[$coll_cnt]["name"]."_collect"} = $pasing_arr[0];

				//max-count
				$pasing_arr = explode("<span class=\"max-count\">", $result);
				$pasing_arr = explode("</span>", $pasing_arr[$coll_arr[$coll_cnt]["num"]]);
				${$coll_arr[$coll_cnt]["name"]."_total"} = $pasing_arr[0];

				${$coll_arr[$coll_cnt]["name"]."_collection"} = explode("<ul class=\"list\">", $result);
				${$coll_arr[$coll_cnt]["name"]."_collection"} = explode("</ul>", ${$coll_arr[$coll_cnt]["name"]."_collection"}[$coll_arr[$coll_cnt]["num"]]);
				${$coll_arr[$coll_cnt]["name"]."_collection"} = str_replace("\n", "", ${$coll_arr[$coll_cnt]["name"]."_collection"}[0]);
				${$coll_arr[$coll_cnt]["name"]."_collection"} = str_replace("\r", "", ${$coll_arr[$coll_cnt]["name"]."_collection"});
				${$coll_arr[$coll_cnt]["name"]."_collection"} = str_replace("\'", "\"", ${$coll_arr[$coll_cnt]["name"]."_collection"});

				$out .= "$('.".$coll_arr[$coll_cnt]["name"]."_collect').html('".${$coll_arr[$coll_cnt]["name"]."_collect"}." / ".${$coll_arr[$coll_cnt]["name"]."_total"}."');";
				$out .= "$('.".$coll_arr[$coll_cnt]["name"]."_zone').html('<ul>".${$coll_arr[$coll_cnt]["name"]."_collection"}."</ul>');";
			}


			
			$nickname = !empty($job_img) ? "<img src=\"".$job_img."\" >".$nickname : $nickname;
			$out .= "$('#nickname').html('".$nickname."');";
			//$out .= "$('.star_total').html('".$heart_total."');";
			if($background_img != "") {
				$out .= "$('.series-img').css(\"background-image\", \"url('".$background_img."')\");";
			} else {
				$out .= "$('.series-img').css(\"background-image\", \"none\");";

			}
			$out .= "$('#property').html(\"".$property.$ability."\");";
			$out .= "$('#server').html('".$server."');";
			$out .= "$('#character_img').html('".$character_img."');";

			$item_out = "<center>";
			$item_half = floor(count($item_img)/2);
			for($i=1; $i<count(($item_img))+1; $i++) {
				$item_out .= "<img src=\"".$item_img[$i]."\">";
				$item_out .= ($item_half == $i) ? "<br/>" : "";			
			}
			$item_out .= "</center>";
			$out .= "$('.item_img').html('".$item_out."');";
			$out .= "$('.engrave').html('".$engrave."');";
			
			/*$out .= "$('.star_zone').html('<ul>".$star_collection."</ul>');";
			$out .= "$('.heart_zone').html('<ul>".$heart_collection."</ul>');";
			$out .= "$('.art_zone').html('<ul>".$heart_collection."</ul>');";*/

			$out .= "</script>";
			//$out .= "<script type='text/javascript'>$(document).ready(function (){ $('#property > div').hover(function (){ $('.profile-ability-tooltip ul').show();}, function() { $('.profile-ability-tooltip ul').hide();});})</script>";
			$out .= "<script type='text/javascript'>$(document).ready(function (){ $('#property > div').hover(function (){ $(this).children().show(); }, function() { $(this).children('div').hide(); });})</script>";


			/*$out = "";
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
			$out .= "</div>";*/

			echo $out;


			//<span class="max-count">94
			//echo $island_mind;
			/*echo "<xmp>";
			print_r($pasing_arr);
			echo "</xmp>";*/


		break;
	}
?>