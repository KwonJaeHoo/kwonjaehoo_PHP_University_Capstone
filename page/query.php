<?php
if (isset($_GET["page"]))
	$page = $_GET["page"]; //1,2,3,4,5
else
	$page = 1;

	$db_host = "localhost"; 
	$db_user = "rainmiro"; 
	$db_passwd = "zoqtmxhs0617!";
	$db_name = "rainmiro"; 
            
	$conn = mysqli_connect($db_host,$db_user,$db_passwd,$db_name);

	//전체 게시글 수
	$query1 = "SELECT count(upload_number) FROM uploads";
	$result1 = mysqli_query($conn, $query1);
	$data1 = mysqli_fetch_array($result1);

	//전체 유저 수 
	$query2 = "SELECT count(id_number) FROM member";
	$result2 = mysqli_query($conn, $query2);
	$data2 = mysqli_fetch_array($result2);

?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<title>Season to Photo Spot</title>
</head>

<body>

	<td> <?= $data1['count(upload_number)'] ?></td>
    <td> <?= $data2['count(id_number)'] ?></td>

</body>
</html>

<!--
post_id - int 				- post_id - int		- tag_id  - int
title - varchar			  	  tag_id  - int		- name - varchar
content - varchar

-->