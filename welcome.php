<?php

require_once 'config.php';
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		*{
			padding: 0;
			margin: 0;
			scroll-behavior: smooth;
			font-family: sans-serif;
		}
		html, body{
			background-color: #efefef;
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100%;
			width: 100%;
		}
		.wrapper{
			box-shadow: 0px 0px 6px grey;
			width: 70%;
			padding: 20px;
			border-radius: 12px;
			background-color: #ffffff;
		}
		.flex-box{
			display: flex;
		}
		.flex-right{
			margin-left: auto;
			margin-right: 0;
		}
		p{
			font-size: 1.2em;
			font-weight: bolder;
			text-transform: capitalize;
		}
		.anchor-log{
			text-decoration: none;
			color: black;
			font-size: .8em;
			text-transform: uppercase;
			font-weight: bolder;
		}
		.name{
			font-size: 1em;
			text-decoration: none;
			color: #002366;
			display: block;
			margin-top: 10px; 
			text-transform: capitalize;
			font-weight: bolder;
		}
	</style>
</head>
<body>
<div class="wrapper">
		<div class="flex-box">
			<div class="flex-left">
				<p><?php echo $_SESSION['username']?></p><br>
			</div>
			<div class="flex-right">
				<a href="logout.php" class="anchor-log">logout</a>
			</div>
		</div>
	<?php
		$sql = "SELECT * FROM users";
		$res = mysqli_query($link, $sql);

		if (mysqli_num_rows($res) > 0) {
			while ($result = mysqli_fetch_assoc($res)) {
	?>

		<a href="chat.php?id=<?php echo $result['id']?>" class="name"><?php echo $result['username']?></a>

	<?php
			}
		}
	?>
	<br>
</div>
</body>
</html>