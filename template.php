<?php
	if (isset($_GET["date"]))
	{
		include 'model1.php';
	}
	else if (isset($_GET["rub"]))
	{
		include 'model2.php';
	}
	else if (isset($_GET["name"]))
	{
		include 'model4.php';
	}
	else
	{
		include 'model3.php';
	}
?>
<html>
	<haed>
		<meta charset="UTF-8">
		<style>
			.a
			{
				float: left;
				margin: 10px;
				width: 400px;
			}
			.b
			{
				margin-top: 10px;
				margin-left: 10px;
				width: 400px;
				text-align: left;
			}
		</style>
	</head>
	<body>
		<div class="b">
			<h2><a href="index.php">News</a></h2>
			<?php include 'menuRub.php' ?>
		</div>
		<div class="b">
			<?php print $page ?>
		</div>
		<div>
			<div class="a">
				<?php print $news ?>
			</div>
			<div class="a">
				<?php include 'insertNews.php' ?>
			</div>
		</div>
		
	</body>
</html>
