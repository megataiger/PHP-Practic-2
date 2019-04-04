<?php
	//$link = mysqli_connect("localhost","student","student", "student");
	
	$link = mysqli_connect("127.0.0.1","megataiger","","base");
	$news = "<table border=\"2\">";
	$page = "";
	$queryForPage =  mysqli_query($link,"SELECT * FROM 321_nemolyaev_News");
	if (isset($_GET["page"]))
	{
		$first = ($_GET["page"]-1)*10;
		$query = mysqli_query($link,"SELECT * FROM 321_nemolyaev_News ORDER BY news_date_time DESC LIMIT $first,10");
		$n = mysqli_num_rows($queryForPage)/10;
		for($i = 1 ; $i <= round($n+1,0,PHP_ROUND_HALF_DOWN) ; $i++)
		{
			if ($i == $_GET["page"])
				$page .= "$i ";
			else
				$page .= "<a href=?page=$i>$i</a> ";
		}
	}
	else
	{
		$query = mysqli_query($link,"SELECT * FROM 321_nemolyaev_News ORDER BY news_date_time DESC LIMIT 0,10");
		$n = mysqli_num_rows($queryForPage)/10;
		for($i = 1 ; $i <= round($n+1,0,PHP_ROUND_HALF_DOWN) ; $i++)
		{
			if ($i == 1)
				$page .= "$i ";
			else
				$page .= "<a href=?page=$i>$i</a> ";
		}
	}
	while ($result = mysqli_fetch_assoc($query))
		{
    		$stroke = array(
    		"news_name" => $result["news_name"],
    		"news_date_time" => $result["news_date_time"],
    		"news_adt" => $result["news_adt"],
    		"news_id" => $result["news_id"]
    	);
    		$news .= "<tr><td><a href=?date=". substr($stroke["news_date_time"],0,10).">". $stroke["news_date_time"]. "</td><td><a href=?name=". $stroke["news_id"] .">". $stroke["news_name"]. "</td></tr><tr><td colspan=\"2\">". $stroke["news_adt"]. "</td></tr>";
		}
	$news .= "</table>";
	mysqli_close($link);
?>
