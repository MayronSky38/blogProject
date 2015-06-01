<html>
<head>
<title>Coment</title>
</head>
<body>

<?php echo validation_errors(); ?>

<form name="contact" method="post" action="/codeigniter/index.php/<?php echo $name ."/". $idPost?>/editComent/<?php echo $idComent ?>">

<h4>Edit <?php echo $title?> post content.</h4>

<h5>Content</h5>
<textarea rows="4" cols="50" name="content">
<?php echo $content ?>
</textarea>

<div><input type="submit" value="Submit" /></div>

</form>
<div class="footer">
	<a href="/codeigniter/index.php/<?php echo $name ."/post/". $idPost ?>" > Go back </a>
</div>
</body>
</html>