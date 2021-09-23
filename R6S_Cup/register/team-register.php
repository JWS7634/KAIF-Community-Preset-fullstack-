<?php
$team_name = $_POST['team_name'];
$p1_name = $_POST['p1_name'];
$p2_name = $_POST['p2_name'];
$p3_name = $_POST['p3_name'];
$p4_name = $_POST['p4_name'];
$p5_name = $_POST['p5_name'];

session_start();
$tl_name=$_SESSION['Cname'];
if(!empty($p1_name) && !empty($p2_name) && !empty($p3_name) && !empty($p4_name) && !empty($p5_name) && !empty($team_name))
{
	$time = date("Y-m-d H:i:s");

	$dbh = new PDO('mysql:host="-";dbname="-";charset=utf8', '-', '-');

	$stmt = $dbh->prepare('SELECT * FROM r6s_kaif_cup_1 WHERE tl_name = :idcode');
	$stmt -> bindValue(":idcode", $tl_name);
	$stmt -> execute();
	$idc = $stmt -> fetch();
	if(count($idc) < 5)
	{
		$stmt = $dbh->prepare('INSERT INTO r6s_kaif_cup_1 (tl_name, p1_name, p2_name, p3_name, p4_name, p5_name, team_name, team_updated) VALUES (:tl_name, :p1_name, :p2_name, :p3_name, :p4_name, :p5_name, :team_name, :team_updated)');
		$stmt -> bindParam(":tl_name", $tl_name);
		$stmt -> bindParam(":p1_name", $p1_name);
		$stmt -> bindParam(":p2_name", $p2_name);
		$stmt -> bindParam(":p3_name", $p3_name);
		$stmt -> bindParam(":p4_name", $p4_name);
		$stmt -> bindParam(":p5_name", $p5_name);
		$stmt -> bindParam(":team_name", $team_name);
		$stmt -> bindParam(":team_updated", $time);
		$stmt -> execute();
		echo "<script>alert('등록 되었습니다.'); history.back(); </script>";
	}
	else
	{
		echo "<script>alert('이미 등록되어 있습니다.'); history.back(); </script>";
	}
}
else{
	echo "<script>alert('팀 정보를 입력해주시기 바랍니다.'); history.back(); </script>";
}
?>