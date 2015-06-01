<html>
<head>
	<title> Blog </title>
</head>
<body>
	<?php 	session_start(); ?>
	<h2><?php echo $title ?></h2>

	<?php foreach ($topic as $topic_item): ?>

	        <h3><a href="/codeigniter/index.php/<?php echo strtolower($topic_item['name']) ?>/<?php echo $topic_item['idTopic'] ?>"><?php echo $topic_item['name'] ?></a></h3>
	        <div class="main">
	                <?php echo $topic_item['description'] ?>
	        </div>

	<?php endforeach ?>
	<?php
	if( isset($_SESSION["nickName"]) ){
		echo "Logged as : " . $_SESSION["nickName"] . " with the id: " . $_SESSION["idUser"] . " as " . $_SESSION["typeUser"];
		?>
		<div class="login">
			<a href="/codeigniter/index.php/logout"> Logout </a> 
		</div>
	<?php
	}  else{ ?>
	<div class="login">
		<a href="/codeigniter/index.php/login"> Login </a> 
	</div>
	<?php } ?>
</body>
</html>