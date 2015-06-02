<html>
<head>
	<title> Coments for  <?php echo $post["title"]?></title>
</head>
<body>
	<?php session_start(); ?>
	<h1> You are at the topic: <?php echo $post["name"] ?> </h1>
	<h2>Coments for the post: <?php echo $post["title"] ?></h2>

	<div class = "postContent">
		<p> <?php echo $post["content"] ?> </p>
		<p> By <?php echo $post["nickName"] ?> at <?php echo $post["publicDate"] ?> </p>
		<?php if( ( isset($_SESSION["nickName"]) ) && ($post["nickName"] === $_SESSION["nickName"] || $_SESSION["typeUser"] === "Admin") && ($post["banned"] == 0) ){?>
		<form action="/codeigniter/index.php/<?php echo strtolower($post['name']) . "/" . $post['idPost'] ?>/editPost">
	   		<input type="submit" value="Edit post">
		</form>
		<?php } else if ($post["banned"] != 0){?>
		<p> This post is banned </p>
		<?php } ?>
		
	</div>

	<?php if( (isset($_SESSION["nickName"])) && $post["banned"] == 0){
	?>
	<form action="/codeigniter/index.php/<?php echo strtolower($post['name']) . "/" . $post['idPost'] ?>/createComent">
	    <input type="submit" value="Coment this post">
	</form>
	<?php } ?>


	<fieldset>
		<legend> Coments </legend>
		<table id ="comentsTable" >		
	<?php 
	if( $coments != null ){ ?>
		<thead>
			<tr>
				<th> Content </th>
				<th> Published </th>
				<th> Author </th>
				<?php if( (isset($_SESSION["nickName"]) ) && $_SESSION["typeUser"] === "Admin"){ ?>
					<th> Actions </th>
				<?php }?>
			</tr>
		</thead>
		<tbody>
		<?php for($i = 0; $i < count($coments); $i++): ?>
			<tr>
		        <td> <h3><?php echo $coments[$i]['content'] ?></a></h3> </td>
		        <td> <h4><?php echo $coments[$i]['publicDate'] ?></h4> </td>
		        <td> <h4><?php echo $coments[$i]['nickName']?></h4> </td>
		        <td>
		        <?php  
					if ($coments[$i]["banned"] != 0 && $post["banned"] == 0){ ?>
					 This coment is banned
				<?php } 
		        if( isset($_SESSION["nickName"]) ){
			        if( ($coments[$i]["nickName"] === $_SESSION["nickName"] || $_SESSION["typeUser"] === "Admin") && ($coments[$i]["banned"] == 0) ){ ?>
					<form action="/codeigniter/index.php/<?php echo strtolower($post['name']) ."/". $post['idPost'] . "/editComent/" . $coments[$i]['idComent']?>?>">
				   		<input type="submit" value="Edit coment">
					</form>
					 
					<?php }
					if( $_SESSION["typeUser"] === "Admin" && ($coments[$i]["banned"] == 0) ){
					?>
						<form action="/codeigniter/index.php/<?php echo strtolower($post['name']) ?>/<?php echo $post['idPost']?>/deleteComent/<?php echo $coments[$i]['idComent']?>">
						    <input type="submit" value="Delete this coment">
						</form>
						<?php }
						if($_SESSION["typeUser"] === "Admin" && $post["banned"] == 0){
							if($coments[$i]['banned'] == 0){ ?>
								<form action="/codeigniter/index.php/<?php echo strtolower($post['name']) ."/". $post['idPost'] . "/banComent/" . $coments[$i]['idComent']?>/1">
								    <input type="submit" value="Ban this coment">
								</form></td>		
							<?php } else{ ?>
								<form action="/codeigniter/index.php/<?php echo strtolower($post['name']) ."/". $post['idPost'] . "/banComent/" . $coments[$i]['idComent']?>/0">
							    	<input type="submit" value="Not banned anymore">
								</form></td>	
								<?php } 
						}
				}?>			
			
				</tr>
		<?php endfor; 
	}
		else{
			?>
			<thead>
				<tr>
					<th> </th>
				</tr>
			</thead>
			<tbody>
			<tr>
				<td> There are no coments for this post so far. </td>
			</tr>
		<?php } ?>
			</tbody>
	</table>
	</fieldset>

	<div class="footer">
		<a href="/codeigniter/index.php/<?php echo strtolower($post['name'])?> "> Go back </a>
	</div>
	<div class="login">
		<?php
		if( isset($_SESSION["nickName"]) ){
			echo "Logged as : " . $_SESSION["nickName"] . " with the id: " . $_SESSION["idUser"] . " as " . $_SESSION["typeUser"];
			?>	
			<a href="/codeigniter/index.php/logout/<?php echo strtolower($post['name']) ."/". $post['idPost']?>"> Logout </a> 
		<?php
		}  else{ ?>
			<a href="/codeigniter/index.php/login/<?php echo strtolower($post['name']) ."/". $post['idPost']?>"> Login </a> 
		<?php } ?>
	</div>
</body>
</html>