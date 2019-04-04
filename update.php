<?php
	$link = mysqli_connect("127.0.0.1","megataiger","","base");
	$query =  mysqli_query($link,"SELECT DISTINCT news_heading FROM 321_nemolyaev_news");
	$article = $_GET["name"];
	$queryForUpdate = mysqli_query($link,"SELECT * FROM 321_nemolyaev_news WHERE news_id=$article");
	if($_POST==true)
	{
		$date = date("Y-m-d H:i:s");
		$name = isset($_POST["name"]) ? $_POST["name"] : "Nothing";
		$text = isset($_POST["text"]) ? $_POST["text"] : "Nothing";
		$adt = substr($text, 0, 250);
		$author = isset($_POST["author"]) ? $_POST["author"] : "Nothing";
		$rub = isset($_POST["rub"]) ? $_POST["rub"] : "Nothing";
		$queryForInsert = "UPDATE `321_nemolyaev_news` SET `news_date_time` = \"$date\", `news_name` = \"$name\", `news_author` = \"$author\", `news_heading` = \"$rub\", `news_adt` = \"$adt\", `news_text` = \"$text\" WHERE news_id=$article";
		mysqli_query($link, $queryForInsert);
		unset($_POST["rub"], $_POST["name"], $_POST["text"], $_POST["author"]);
		header("Location: index.php?name=$article");
	}
	else
	{
		$result = mysqli_fetch_assoc($queryForUpdate);
		$name = $result["news_name"];
		$text = $result["news_text"];
		$author = $result["news_author"];
		print "\t\t\t\t<form action=\"update.php?name=$article\" method=\"POST\">\n";
		print "\t\t\t\t\t<b>Заголовок</b><br>\n";
		print "\t\t\t\t\t\t<input name=\"name\" type=\"text\" size=\"50\" value=\"$name\"></input><br>\n";
		print "\t\t\t\t\t<b>Текст</b><br>\n";
		print "\t\t\t\t\t\t<textarea name=\"text\" cols=\"40\" rows=\"3\">$text</textarea><br>\n";
		print "\t\t\t\t\t\t<b>Рубрика</b><br>\n";
		print "\t\t\t\t\t\t<select name=\"rub\">\n";
		while ($result = mysqli_fetch_assoc($query))
		{
			$stroke = $result["news_heading"];
			print "\t\t\t\t\t\t\t<option> $stroke </option>\n";
		}
		print "\t\t\t\t\t\t</select><br>\n";
		print "\t\t\t\t\t\t<b>Автор</b><br>\n";
		print "\t\t\t\t\t\t<input name=\"author\" type=\"text\" size=\"50\" value=\"$author\"></input><br>\n";
		print "\t\t\t\t\t\t<input type=\"submit\" value=\"Изменить\"><br>\n";
	}
	mysqli_close($link);
?>