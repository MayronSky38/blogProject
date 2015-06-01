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
</div>
<?php if( isset($_SESSION["nickName"]) ){
?>
<form action="/codeigniter/index.php/<?php echo strtolower($post['name']) . "/" . $post['idPost'] ?>/createComent">
    <input type="submit" value="Coment this post">
</form>
<?php } ?>
<fieldset>
	<legend> Coments </legend>
<?php 
if( $coments != null ){
	for($i = 0; $i < count($coments); $i++): ?>

	        <h3><?php echo $coments[$i]['content'] ?></a></h3>
	        <div class="coment">
	                <?php echo $coments[$i]['publicDate'] . " by " . $coments[$i]['nickName']?>
	        </div>

	<?php endfor; } else{?>
		<div class="coment">
			<p> There are no coments for this post so far. </p>
		</div>
	<?php } ?>
</fieldset>
<div class="footer">
	<a href="/codeigniter/index.php/<?php echo strtolower($post['name']) ."/".$post['idTopic']?>" > Go back </a>
</div>
</body>
</html>