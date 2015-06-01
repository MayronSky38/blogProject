<html>
<head>
	<title> Posts for  <?php echo $topic["name"]?></title>
</head>
<body>
<?php session_start(); ?>
<h2><?php echo $topic["name"] ?></h2>

<?php for($i = 0; $i < count($posts); $i++): ?>

        <h3><a href="/codeigniter/index.php/<?php echo strtolower($topic['name']) ?>/post/<?php echo $posts[$i]['idPost'] ?>"><?php echo $posts[$i]['title'] ?></a></h3>
        <div class="main">
                <?php echo $posts[$i]['publicDate'] . " by " . $user[$i]['nickName']?>
        </div>

<?php endfor ?>
<div class="footer">
	<a href="/codeigniter/index.php/home" > Go back </a>
</div>

<?php if( isset($_SESSION["nickName"]) ){
?>
<form action="/codeigniter/index.php/<?php echo strtolower($topic['name']) ?>/createPost">
    <input type="submit" value="Create a new Post">
</form>
<?php } ?>
</body>
</html>