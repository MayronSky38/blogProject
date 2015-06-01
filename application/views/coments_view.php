<html>
<head>
	<title> Coments for  <?php echo $post["title"]?></title>
</head>
<body>
<h1> You are at the topic: <?php echo $post["name"] ?> </h1>
<h2>Coments for the post: <?php echo $post["title"] ?></h2>

<div class = "postContent">
	<p> <?php echo $post["content"] ?> </p>
	<p> By <?php echo $post["nickName"] ?> at <?php echo $post["publicDate"] ?> </p>
</div>
<?php 
if( isset($coments) ){
	for($i = 0; $i < count($coments); $i++): ?>

	        <h3><?php echo $coments[$i]['content'] ?></a></h3>
	        <div class="main">
	                <?php echo $coments[$i]['publicDate'] . " by " . $coments[$i]['nickName']?>
	        </div>

	<?php endfor; }?>
<div class="footer">
	<a href="/codeigniter/index.php/main/<?php echo $post["idTopic"]?>" > Go back </a>
</div>
</body>
</html>