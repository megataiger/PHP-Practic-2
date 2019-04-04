<?php
	$link = mysqli_connect("127.0.0.1","megataiger","","base");
	$date = $_GET["date"];
	$news = "<table border=\"2\">";
	$page = "";
	$queryForPage =  mysqli_query($link,"SELECT * FROM 321_nemolyaev_News WHERE news_date_time LIKE \"$date %\"");
	if (isset($_GET["page"]))
	{
		$first = ($_GET["page"]-1)*10;
		$query = mysqli_query($link, "SELECT * FROM 321_nemolyaev_News WHERE news_date_time LIKE \"$date %\" ORDER BY news_date_time DESC LIMIT $first,10");
		$n = mysqli_num_rows($queryForPage)/10;
		for($i = 1 ; $i <= round($n+1,0,PHP_ROUND_HALF_DOWN) ; $i++)
		{
			if ($i == $_GET["page"])
				$page .= "$i ";
			else
				$page .= "<a href=?date=$date&page=$i>$i</a> ";
		}
	}
	else
	{
		$query = mysqli_query($link, "SELECT * FROM 321_nemolyaev_News WHERE news_date_time LIKE \"$date %\" ORDER BY news_date_time DESC LIMIT 0,10");
		$n = mysqli_num_rows($queryForPage)/10;
		for($i = 1 ; $i <= round($n+1,0,PHP_ROUND_HALF_DOWN) ; $i++)
		{
			if ($i == 1)
				$page .= "$i ";
			else
				$page .= "<a href=?date=$date&page=$i>$i</a> ";
		}
	}
	while ($result = mysqli_fetch_assoc($query))
	{
		$stroke = array(
			"date" => $result["news_date_time"],
			"name" => $result["news_name"],
			"adt" => $result["news_adt"],
			"id" => $result["news_id"]
		);
		$news .= "<tr><td>". $stroke["date"]. "</td><td><a href=?name=". $stroke["id"] .">". $stroke["name"]. "</td></tr><tr><td colspan=\"2\">". $stroke["adt"]. "</td></tr>";

	}
	$news .= "</table>";
	mysqli_close($link);
?>