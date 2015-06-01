<html>
<head>
	<title> Users Archive </title>
</head>
<body>
<h2><?php echo $title ?></h2>

<?php foreach ($user as $users_item): ?>

        <h3><?php echo $users_item['nickName'] ?></h3>
        <div class="main">
                <?php echo $users_item['typeUser'] ?>
        </div>
        <p><a href="<?php echo $users_item['nickName'] ?>">View article</a></p>

<?php endforeach ?>
</body>
</html>