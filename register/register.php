<?php

$name = $_POST['Cname'];
$id = $_POST['Uname'];
$password = $_POST['Upass'];

$dbh = new PDO('mysql:host="-";dbname="-";charset=utf8', '-', '-');

$stmt = $dbh->prepare('SELECT * FROM userdata WHERE Uname = :idcode');
$stmt -> bindValue(":idcode", $id);
$stmt -> execute();
$idc = $stmt -> fetch();
$stmt = $dbh->prepare('SELECT * FROM userdata WHERE Cname = :idcode');
$stmt -> bindValue(":idcode", $name);
$stmt -> execute();
$nic = $stmt -> fetch();

if(count($idc) < 3 && !empty($password) && !empty($id) && !empty($name))
{	
	if(count($nic) < 3)
	{	
		$stmt = $dbh->prepare('INSERT INTO userdata (Cname, Uname, Upass) VALUES (:Cname, :Uname, :Upass)');
		$stmt -> bindParam(":Cname", $name);
		$stmt -> bindParam(":Uname", $id);
		$stmt -> bindParam(":Upass", $password);
		$stmt -> execute();

		session_start();
		$_SESSION['Cname'] = $name;
		$_SESSION['Uname'] = $id;
		$_SESSION['Upass'] = $password;
		$_SESSION['logon'] = 1;
		echo "<script>alert('닉네임 중복'); history.go(-2); </script>";
	}
}
else if(count($nic) > 2)
{
	echo "<script>alert('닉네임 중복'); history.back(); </script>";
}
else if(count($idc) > 2)
{
	echo "<script>alert('아이디 중복'); history.back(); </script>";
}
else{
	echo "<script>alert('실패'); history.back(); </script>";
}
?>