<html>
<head>
	<title> Coments for  <?php echo $coments[0]["title"]?></title>
</head>
<body>
<h1> You are at the topic: <?php echo $coments[0]["name"] ?> </h1>
<h2>Coments for the post: <?php echo $coments[0]["title"] ?></h2>

<?php for($i = 0; $i < count($coments); $i++): ?>

        <h3><?php echo $coments[$i]['content'] ?></a></h3>
        <div class="main">
                <?php echo $coments[$i]['publicDate'] . " by " . $coments[$i]['nickName']?>
        </div>

<?php endfor ?>
<div class="footer">
	<a href="/codeigniter/index.php/main/<?php echo $coments[0]["idTopic"]?>" > Go back </a>
</div>
</body>
</html>