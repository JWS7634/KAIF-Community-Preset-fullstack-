<?php
$dbh = new PDO('mysql:host="-";dbname="-";charset=utf8', '-', '-');
$stmt = $dbh->prepare('SELECT * FROM r6s_kaif_cup_1');
$stmt -> execute();
$row = $stmt -> fetch();
?>
<html>
<head>
	<title>KAIF the FPS</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../main.css">
</head>
<body>
	<div class="banner-box">
		<img src="../../res/KAIF_logo_alpha_banner.png">
	</div>
	<div class="banner-box-opz">
	</div>
	<div class="title-bar">
	<h2>R6: Siege (PC) KAIF Open Cup | KAIF The FPS</h2>
	</div>
	<div class="Menu-Button">
		<ul>
			<li><button onclick="location.href='../info'">정보</button></li>
			<li><button onclick="location.href='../table'">대진표</buttona></li>
			<li><button class="active">팀</button></li>
			<li><button onclick="location.href='../rolebook'">규칙</button></li>
			<li><button onclick="location.href='../register'">등록</button></li>
		</ul>
	</div>
	<div class="context-box">
		<h2 class="context-title"><strong>간단 규정</strong></h2>
		<div class="main-content">
				<p><strong>팀 목록:</strong></p>
				<ul>
					<?
						$row;
						while(count($row) == 16)
						{
							$tl_name = $row['tl_name'];
							$team_name = $row['team_name'];
							echo "<li>";
							echo "팀명: ";
							echo "<a href=\"./teamdetail?team=";
							echo $team_name;
							echo "\">";
							echo $team_name;
							echo "</a>";
							echo "<ul><li>";
							echo " 팀장: ";
							echo $tl_name;
							echo "</li></ul>";
							echo "</li>";
							$row = $stmt -> fetch();
						}
					?>
				</ul>
		</div>
	</div>
</body>
</html>