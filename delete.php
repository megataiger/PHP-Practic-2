<?php
	$link = mysqli_connect("127.0.0.1","megataiger","","base");
	$id = $_GET["name"];
	mysqli_query($link, "DELETE FROM `321_nemolyaev_news` WHERE `news_id` = $id");
	mysqli_close($link);
	header("Location: index.php");
?>