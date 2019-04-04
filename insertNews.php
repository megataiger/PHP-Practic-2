<?php
	$link = mysqli_connect("127.0.0.1","megataiger","","base");
	$query =  mysqli_query($link,"SELECT DISTINCT news_heading FROM 321_nemolyaev_news");
	if($_POST==true)
	{
		$query = mysqli_query($link,"SELECT news_id FROM 321_nemolyaev_news ORDER BY news_id DESC");
		$result = mysqli_fetch_assoc($query);
		$number = array("id" => $result["news_id"]);
		$number["id"]++;
		$date = date("Y-m-d H:i:s");
		$name = isset($_POST["name"]) ? $_POST["name"] : "Nothing";
		$text = isset($_POST["text"]) ? $_POST["text"] : "Nothing";
		$adt = substr($text, 0, 250);
		$author = isset($_POST["author"]) ? $_POST["author"] : "Nothing";
		$rub = isset($_POST["rub"]) ? $_POST["rub"] : "Nothing";
		$queryForInsert = "INSERT INTO `321_nemolyaev_news` (`news_id`, `news_date_time`, `news_name`, `news_author`, `news_heading`, `news_adt`, `news_text`) VALUES ('";
		$queryForInsert .= $number["id"]. "', '$date', '$name', '$author', '$rub', '$adt', '$text')";
		mysqli_query($link, $queryForInsert);
		unset($_POST["rub"], $_POST["name"], $_POST["text"], $_POST["author"]);
		header('Location: index.php');
	}
	else
	{
		print "\t\t\t\t<form action=\"insertNews.php\" method=\"POST\">\n";
		print "\t\t\t\t\t<b>Заголовок</b><br>\n";
		print "\t\t\t\t\t\t<input name=\"name\" type=\"text\" size=\"50\"><br>\n";
		print "\t\t\t\t\t<b>Текст</b><br>\n";
		print "\t\t\t\t\t\t<textarea name=\"text\" cols=\"40\" rows=\"3\"></textarea><br>\n";
		print "\t\t\t\t\t\t<b>Рубрика</b><br>\n";
		print "\t\t\t\t\t\t<select name=\"rub\">\n";
		while ($result = mysqli_fetch_assoc($query))
		{
			$stroke = $result["news_heading"];
			print "\t\t\t\t\t\t\t<option> $stroke </option>\n";
		}
		print "\t\t\t\t\t\t</select><br>\n";
		print "\t\t\t\t\t\t<b>Автор</b><br>\n";
		print "\t\t\t\t\t\t<input name=\"author\" type=\"text\" size=\"50\"><br>\n";
		print "\t\t\t\t\t\t<input type=\"submit\" value=\"Добавить\"><br>\n";
	}
?>