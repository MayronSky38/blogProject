<html>
<head>
<title>Post</title>
</head>
<body>

<?php echo validation_errors(); ?>

<form name="contact" method="post" action="/codeigniter/index.php/<?php echo $topicName ?>/createPost">

<h4>New Post for <?php echo $topicName?> </h4>
<h5>Title</h5>
<input type="text" name="title" value="<?php echo set_value('title'); ?>" size="50"/>

<h5>Content</h5>
<textarea rows="4" cols="50" name="content" value="<?php echo set_value('content'); ?>">
</textarea>

<div><input type="submit" value="Submit" /></div>

</form>
<div class="footer">
	<a href="/codeigniter/index.php/<?php echo $topicName ."/". $idTopic ?>" > Go back </a>
</div>
</body>
</html>