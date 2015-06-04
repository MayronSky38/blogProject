<html>
<head>
<title>Post</title>
</head>
<body>

<div class="container text-align-center" style="margin-top:10%;">
	<p><?php echo validation_errors(); ?></p>
	<h3 class="col-md-offset-4"> New Post </h3>
	<form class="form-horizontal" name="contact" method="post" action="<?php echo base_url() . "/createPost"?>">
		<div class="form-group">
			<p class="col-md-offset-2 control-label col-md-2">Title</p>
			<input type="text" name="title" value="<?php echo set_value('title'); ?>" size="50"/>
		</div>
		<div class="form-group">
			<p class="col-md-offset-2 control-label col-md-2">Content</p>
			<textarea rows="4" cols="50" name="content" value="<?php echo set_value('content'); ?>">
			</textarea>
		</div>	
		<div class="form-group">
			<?php for($i = 0; $i < count($topic); $i++): ?>
			
				<p class="col-md-offset-1 control-label col-md-1"> 
					<input type="radio" name="topicName" value="<?php echo $topic[$i]['name']?>" checked> <?php echo $topic[$i]['name'] ?> 
				</p>
			
			<?php endfor; ?>
 		</div>
		<div class="form-group">
			<div class="col-md-offset-4 col-md-2">
				<input type="submit" value="Submit" />
			</div>
		</div>
	</form>
	<div class="footer">
		<a href="<?php echo base_url() . "/home"?>" > Go back </a>
	</div>
</div>
</body>
</html>