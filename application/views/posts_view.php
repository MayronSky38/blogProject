<html>
<head>
	<title> Posts for  <?php echo $topic["name"]?></title>
</head>
<body>
	<?php session_start(); ?>
	<h2><?php echo $topic["name"] ?></h2>

	<?php if( isset($_SESSION["nickName"]) ){ ?>
		<form action="/codeigniter/index.php/<?php echo strtolower($topic['name']) ?>/createPost">
		    <input type="submit" value="Create a new Post">
		</form>
	<?php } ?>

	<?php for($i = 0; $i < count($posts); $i++): ?>

	        <h3><a href="/codeigniter/index.php/<?php echo strtolower($topic['name']) ?>/post/<?php echo $posts[$i]['idPost'] ?>"><?php echo $posts[$i]['title'] ?></a></h3>
	        <div class="main">
	                <?php echo $posts[$i]['publicDate'] . " by " . $user[$i]['nickName']?>
	        
	        <?php if( (isset($_SESSION["nickName"]) ) && $_SESSION["typeUser"] === "Admin" ){
			?>
			<form action="/codeigniter/index.php/<?php echo strtolower($topic['name']) ?>/deletePost/<?php echo $posts[$i]['idPost']?>">
			    <input type="submit" value="Delete this post">
			</form>	
			<?php if($posts[$i]['banned'] == 0){ ?>
				<form action="/codeigniter/index.php/<?php echo strtolower($topic['name']) ?>/banPost/<?php echo $posts[$i]['idPost']?>/1">
				    <input type="submit" value="Ban this post">
				</form>		
			<?php } else{ ?>
				<form action="/codeigniter/index.php/<?php echo strtolower($topic['name']) ?>/banPost/<?php echo $posts[$i]['idPost']?>/0">
			    <input type="submit" value="Not banned anymore">
				</form>	
				<?php } 	 	 
		}?>
		</div>
	<?php endfor; ?>
	<div class="footer">
		<a href="/codeigniter/index.php/home" > Go back </a>
	</div>

	

	<div class="login">
		<?php
		if( isset($_SESSION["nickName"]) ){
			echo "Logged as : " . $_SESSION["nickName"] . " with the id: " . $_SESSION["idUser"] . " as " . $_SESSION["typeUser"];
			?>	
			<a href="/codeigniter/index.php/logout/<?php echo strtolower($topic['name']) ?>"> Logout </a> 
		<?php
		}  else{ ?>
			<a href="/codeigniter/index.php/login/<?php echo strtolower($topic['name']) ?>"> Login </a> 
		<?php } ?>
	</div>	
</body>
</html>