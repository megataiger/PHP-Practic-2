<?php
	$link = mysqli_connect("127.0.0.1","megataiger","","base");
	
	$page = "";
	$id = $_GET["name"];
	$news = "<a href=update.php?name=$id>Изменить</a><br><a href=delete.php?name=$id>Удалить</a><h1>";
	$query = mysqli_query($link,"SELECT * FROM 321_nemolyaev_News WHERE news_id = $id");
	$result = mysqli_fetch_assoc($query);
	$stroke = array(
			"date" => $result["news_date_time"],
			"name" => $result["news_name"],
			"text" => $result["news_text"],
			"nick" => $result["news_author"],
			"rub" => $result["news_heading"]
		);
	$news .= $stroke["name"] . "</h1>" . $stroke["date"] . "<br><a href=?rub=" . $stroke["rub"] . ">" . $stroke["rub"] . "</a><br>" . $stroke["text"] . "<br><br>Автор: " . $stroke["nick"];
	mysqli_close($link);
?>