<?php
/*echo "<xmp>";
print_r($_SERVER);
echo "</xmp>";*/
$name = empty($_GET["name"]) ? "준혂" : $_GET["name"];
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
	function info() {
		$.ajax({
			type : "POST",
			data : {"mode":"info", "name":"<?=$name?>"},
			url  : "./state/",
			success : function(e) {
				//alert(e);
				$("#info").html(e);
			}
		})
	}
	$(document).ready(function(){
		info();
	})
</script>

<div id="info"></div>