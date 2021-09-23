<?php

$team = $_GET['team'];

$dbh = new PDO('mysql:host="-";dbname="-";charset=utf8', '-', '-');
$stmt = $dbh->prepare('SELECT * FROM r6s_kaif_cup_1 WHERE team_name = :Tname');
$stmt -> bindValue(":Tname", $team);
$stmt -> execute();
$ros = $stmt -> fetch();
?>
<html>
<head>
	<title>KAIF the FPS</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../main.css">
</head>
<body>
	<div class="banner-box">
		<img src="../../../res/KAIF_logo_alpha_banner.png">
	</div>
	<div class="banner-box-opz">
	</div>
	<div class="title-bar">
	<h2>R6: Siege (PC) KAIF Open Cup | KAIF The FPS</h2>
	</div>
	<div class="Menu-Button">
		<ul>
			<li><button onclick="location.href='../../info'">정보</button></li>
			<li><button onclick="location.href='../../table'">대진표</buttona></li>
			<li><button class="active">팀</button></li>
			<li><button onclick="location.href='../../rolebook'">규칙</button></li>
			<li><button onclick="location.href='../../register'">등록</button></li>
		</ul>
	</div>
	<div class="context-box">
		<h2 class="context-title"><strong>팀 정보</strong></h2>
		<div class="main-content">
			<div class="league-text league-text-quickrules">
				<div>
					<span class="info-header">
						<strong>팀장, 코치:</strong>
					</span> 
					<?echo $ros[0];?><!---->
				</div>
				<strong>팀명:</strong>
					<?echo $ros[6];?>
				<p><strong>로스터(인게임 닉네임):</strong></p>
				<ul>
					<li><?echo $ros[1];?></li>
					<li><?echo $ros[2];?></li>
					<li><?echo $ros[3];?></li>
					<li><?echo $ros[4];?></li>
					<li><?echo $ros[5];?></li>
				</ul>
				<button onClick="history.back()" class="Kaif-c-button">뒤로가기</button>
			</div>
		</div>
	</div>
</body>
</html>