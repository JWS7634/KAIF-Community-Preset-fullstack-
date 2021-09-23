<?php

$id = $_POST['Uname'];
$password = $_POST['Upass'];

$dbh = new PDO('mysql:host="-";dbname="-";charset=utf8', '-', '-');
$stmt = $dbh->prepare('SELECT * FROM userdata WHERE Uname = :idcode');
$stmt -> bindValue(":idcode", $id);
$stmt -> execute();
$row = $stmt -> fetch();

if($row['Upass'] == $password && !empty($password) && !empty($id))
{
	session_start();
	$_SESSION['Cname'] = $row['Cname'];
	$_SESSION['Uname'] = $id;
	$_SESSION['Upass'] = $password;
	$_SESSION['logon'] = 1;
	echo "<script>history.go(-2); </script>";
}
else
{
    echo "<script>alert('로그인 실패'); history.back(); </script>";
}
?>