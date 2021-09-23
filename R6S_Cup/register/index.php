<html>
<head>
	<title>KAIF the FPS</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../main.css">
	<script>
		function Confirmresi(){
			var form = document.userinput;
			var tname = document.getElementsByName("team_name");
			var p1 = document.getElementsByName("p1_name");
			var p2 = document.getElementsByName("p2_name");
			var p3 = document.getElementsByName("p3_name");
			var p4 = document.getElementsByName("p4_name");
			var p5 = document.getElementsByName("p5_name");
			if(p1 === "" || p2 === "" || p3 === "" || p4 === "" || p5 === "")
				alert("로스터를 모두 입력해 주세요");
			else if(tname === "")
				alert("팀명을 입력해 주세요");
			else
				form.submit();
		}
	</script>
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
			<li><button onclick="location.href='../team'">팀</button></li>
			<li><button onclick="location.href='../rolebook'">규칙</button></li>
			<li><button class="active">등록</button></li>
		</ul>
	</div>

	<div class="context-box">
		<div class="main-content">
			<div>
				<div>
					<span class="info-header">
						<strong>경기:</strong>
					</span> 
					Rainbow Six: Siege (PC) 
				</div>
				<div>
					<span class="info-header">
						<strong>모드:</strong>
					</span> 
				5on5 Bomb 
				</div>
				<div>
					<span class="info-header">
						<strong>요구사항:</strong>
					</span>
					<ul>
						<li>팀은 5명의 선수가 있어야 합니다.</li>
						<li>선수들의 랭크 MMR 평균이 3000 이하여야 합니다.</li>
						<li>팀에 코치가 있으면 코치가 팀장으로서 팀을 등록해야 합니다.</li>
						<li>선수들은 그들의 Uplay Nickname game ID를 입력해야 합니다.</li>
					</ul>
				</div>
				<div>
				</div>
			</div>
		</div>
	</div>
	<?php
		$dbh = new PDO('mysql:host="-";dbname="-";charset=utf8', '-', '-');
		$stmt = $dbh->prepare('SELECT * FROM kaif_cups WHERE Name = :idcode');
		$stmt -> bindValue(":idcode", "KAIF R6s Open Cup");
		$stmt -> execute();
		$row = $stmt -> fetch();

		session_start();
		$tl_name=$_SESSION['Cname'];
		$time_now=strtotime(date());
		$deadline=strtotime($row['Deadline']);
		if($time_now < $deadline)
		{
			if($_SESSION['logon'] == 1)
			{
				echo "
				<div class=\"context-box\">
				<h2 class=\"context-title\"><strong>등록</strong></h2>
				<div class=\"main-content\">
					<div class=\"league-text league-text-quickrules\">
						<div>
							<span class=\"info-header\">
								<strong>등록자(팀장 or 코치):</strong>
							</span> ";
				echo $tl_name;
				echo "
						</div>
							<form class=\"login-box\" method=\"POST\" action=\"team-register.php\" name=\"userinput\">
								<p><strong>팀명:</strong></p>
									<input placeholder=\"팀명\" class=\"input-index\" type='text' name=\"team_name\">
								<p><strong>로스터 등록(인게임 닉네임):</strong></p>
									<input placeholder=\"로스터1\" class=\"input-index\" type='text' name=\"p1_name\">
									<input placeholder=\"로스터2\" class=\"input-index\" type='text' name=\"p2_name\">
									<input placeholder=\"로스터3\" class=\"input-index\" type='text' name=\"p3_name\">
									<input placeholder=\"로스터4\" class=\"input-index\" type='text' name=\"p4_name\">
									<input placeholder=\"로스터5\" class=\"input-index\" type='text' name=\"p5_name\">
							</form>
						</div>
					</div>
				</div>
				<div class=\"context-box\">
					<h2 class=\"context-title\">
						<strong>최종 등록</strong>
					</h2>
					<div class=\"main-content\">
						<p><strong>(등록 전 다시 한번 확인해주세요! 정보수정은 어드민에게 요청해주시길 바랍니다!)</strong></p>
						<button class=\"Kaif-c-button\" onClick=\"Confirmresi()\">
							등록
						</button>
					</div>
				</div>";
			}
			else
			{
				echo"</div>
				<div class=\"context-box\">
					<h2 class=\"context-title\">
						<strong>로그인</strong>
					</h2>
					<div class=\"main-content\">
						<button class=\"Kaif-c-button\" onClick=\"location.href='../../login/'\">로그인</button>
					</div>
				</div>";
			}
		}
		else
		{
			echo"</div> 
				<div class=\"context-box\">
					<div class=\"main-content\">
						<h1>등록기간이 지났습니다</h1>
					</div>
				</div>";
		}
		?>
</body>
</html>