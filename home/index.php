<?php
$button_context;
$button_URL;
session_start();
if($_SESSION['logon'] == 1)
{
	$button_context="대회 등록";
	$button_URL="../login/index.html";
}
else
{
	$button_context="로그인";
	$button_URL="../login/index.html";
}
?>
<html>
<head>
	<title>KAIF the FPS</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<div class="banner-box">
			<img src="../res/KAIF_logo_alpha_banner.png">
			<ul>
				<li><a class="active" href="#home">Home</a></li>
				<li><a href="#news">News</a></li>
				<li><a href="#contact">Contact</a></li>
				<li><a href="#about">About</a></li>
				<?php
					$User_name;
					$button_URL;
					session_start();
					if($_SESSION['logon'] == 1)
					{
						echo"<li><a class="Userbar">"$_SESSION['Cname']"님</a></li>";
					}
					else
					{
						echo"<li><a href="../login/" class="loginbutton">로그인</a></li>";
					}
				?>
				<li><a class="Userbar">유저정보란</a></li>
			</ul>
	</div>
	<div class="banner-box-opz">
	</div>
	<div class="solid-box">
		<h1>Welcome to KAIF Clan!</h1>
	</div>
</body>
</html>