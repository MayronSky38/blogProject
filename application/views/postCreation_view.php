<div class="container text-align-center" style="margin-top:10%;">
	<p><?php echo validation_errors(); ?></p>

	<?php if( isset($post['content']) ){ ?>
	<h3 class="col-md-offset-4"> Edit Post </h3>
	<form class="form-horizontal" name="contact" method="post" action="<?php echo base_url() . "/editPost/". $post['idPost'] ?>">
		<div class="form-group">
			<p class="col-md-offset-2 control-label col-md-2">Title</p>
			<input type="text" name="title" value="<?php echo $post['title'] ?>" size="50"/>
		</div>
		<div class="form-group">
			<p class="col-md-offset-2 control-label col-md-2">Content</p>
			<textarea rows="4" cols="50" name="content" value="<?php echo $post['content'] ?>"> <?php echo $post['content'] ?> </textarea>
		</div>	
		<div class="form-group">
			<?php for($i = 0; $i < count($topic); $i++): 
				if($topic[$i]['name'] === $post['name']){ ?>		
				<p class="col-md-offset-1 control-label col-md-1"> 
					<input type="radio" name="topicName" value="<?php echo $topic[$i]['name']?>" checked> <?php echo $topic[$i]['name'] ?> 
				</p>
				<?php }	else { ?>
				<p class="col-md-offset-1 control-label col-md-1"> 
					<input type="radio" name="topicName" value="<?php echo $topic[$i]['name']?>"> <?php echo $topic[$i]['name'] ?> 
				</p>
			<?php } 
			endfor; ?>
 		</div>

	<?php } else{ ?>
	<h3 class="col-md-offset-4"> New Post </h3>
	<form class="form-horizontal" name="contact" method="post" action="<?php echo base_url() . "/createPost"?>">
		<div class="form-group">
			<p class="col-md-offset-2 control-label col-md-2">Title</p>
			<input type="text" name="title" value="<?php echo set_value('title'); ?>" size="50"/>
		</div>
		<div class="form-group">
			<p class="col-md-offset-2 control-label col-md-2">Content</p>
			<textarea rows="4" cols="50" name="content" value="<?php echo set_value('content'); ?>"></textarea>
		</div>	
		<div class="form-group">
			<?php for($i = 0; $i < count($topic); $i++): ?>
			
				<p class="col-md-offset-1 control-label col-md-1"> 
					<input type="radio" name="topicName" value="<?php echo $topic[$i]['name']?>" checked> <?php echo $topic[$i]['name'] ?> 
				</p>	
			<?php endfor; ?>
 		</div>
 		<?php } ?>

		<div class="form-group">
			<div class="col-md-offset-4 col-md-2">
				<input type="submit" value="Submit" />
			</div>
		</div>
	</form>
	<?php if( isset($post['content']) ){ ?>
	<div class="footer">
		<a href="<?php echo base_url() . "post/" . $post['idPost'] ?>" > Go back </a>
	</div>
	<?php } else{ ?>
	<div class="footer">
		<a href="<?php echo base_url() . "home" ?>" > Go back </a>
	</div>
	<?php } ?>
</div>
</body>
</html>