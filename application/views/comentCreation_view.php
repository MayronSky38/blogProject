<html>
<head>
<title>Coment</title>
</head>
<body>

<?php echo validation_errors(); ?>

<form name="contact" method="post" action="/codeigniter/index.php/<?php echo $topicName ."/". $idPost?>/createComent">

<h4>New coment for <?php echo $postTitle?> post.</h4>

<h5>Content</h5>
<textarea rows="5" cols="70" name="content" value="<?php echo set_value('content'); ?>">
</textarea>

<div><input type="submit" value="Submit" /></div>

</form>
<div class="footer">
	<a href="/codeigniter/index.php/<?php echo $topicName ?>/post/<?php echo $idPost ?>" > Go back </a>
</div>
</body>
</html>