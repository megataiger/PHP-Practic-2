<?php
$link = mysqli_connect("localhost","student","student", "student");

$news = "<table border=\"2\">";

$query = mysqli_query($link,'SELECT * FROM 321_Nemolyaev_News ORDER BY news_date_time DESC limit 0,1');

if (isset($_GET["page"]))
{
$get = $_GET["page"]*10+10;

$interval = 'SELECT * FROM 321_Nemolyaev_News ORDER BY news_date_time DESC LIMIT ';
$interval .= '1, '. $_GET["page"];

$query = mysqli_query($link,$interval);

while ($result = mysqli_fetch_assoc($query))
{
    $stroke = array(
    "news_name" => $result["news_name"],
    "news_date_time" => $result["news_date_time"],
    "news_adt" => $result["news_adt"]);
    $news .= "<tr><td>". $stroke["news_date_time"]. "</td><td>". $stroke["news_name"]. "</td></tr><tr><td colspan=\"2\">". $stroke["news_adt"]. "</td></tr>";
}
}
else
{
while ($result = mysqli_fetch_assoc($query)){
    $stroke = array(
    "news_name" => $result["news_name"],
    "news_date_time" => $result["news_date_time"],
    "news_adt" => $result["news_adt"]);
    $news .= "<tr><td>". $stroke["news_date_time"]. "</td><td>". $stroke["news_name"]. "</td></tr><tr><td colspan=\"2\">". $stroke["news_adt"]. "</td></tr>";
}
}

$news .= "</table>";

print $news;
?>
