<?php
	$link = mysqli_connect("127.0.0.1","megataiger","","base");
	$rub = "<form action=\"index.php\" method=\"GET\"><select name=\"rub\">";
	$query =  mysqli_query($link,"SELECT DISTINCT news_heading FROM 321_nemolyaev_news");
	while ($result = mysqli_fetch_assoc($query))
	{
		$stroke = $result["news_heading"];
		$rub .= "<option value=\"". $stroke ."\"" . $stroke . ">$stroke</option>";
	}
	$rub .= "<input type=\"submit\" value=\"Выбрать\"></select></form>";
	print $rub;
	mysqli_close($link);
?>