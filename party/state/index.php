<?php
	error_reporting( E_ALL );
	ini_set( "display_errors", 1 );

	foreach($_POST as $key=>$value) {
		$$key = $value;		
	}
	include "../class/util.php";
	$util = new util;

	switch($mode) {
		case "info":
			$char_arr = $util->char_arr($name);
			

			echo "<xmp>";
			print_r($char_arr);
			echo "</xmp>";

			$server_arr = $util->server_arr($name);

			for($i=0; $i<count($server_arr);$i++) {
				for($j=0; $j<count($char_arr[$server_arr[$i]]); $j++) {
					//echo $char_arr[$server_arr[$i]][$j]."<br/>";
					$level = $util->char_level($char_arr[$server_arr[$i]][$j]["name"]);
					$char_arr[$server_arr[$i]][$j]["level"] = $level;
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

