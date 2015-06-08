<div class="container text-align-center">
	<p><?php echo validation_errors(); ?></p>

	<?php if( isset($post['content']) ){ ?>
	<p> Edit Post </p>
	<form name="contact" method="post" action="<?php echo base_url() . "/editPost/". $post['idPost'] ?>">
			<p>Title</p>
			<input type="text" name="title" value="<?php echo $post['title'] ?>" size="50"/>
			<p>Content</p>
			<textarea rows="4" cols="50" name="content" value="<?php echo $post['content'] ?>"><?php echo $post['content'] ?></textarea>
			<?php for($i = 0; $i < count($topic); $i++): 
				if($topic[$i]['name'] === $post['name']){ ?>		
				<p> 
					<input type="radio" name="topicName" value="<?php echo $topic[$i]['name']?>" checked> <?php echo $topic[$i]['name'] ?> 
				</p>
				<?php }	else { ?>
				<p> 
					<input type="radio" name="topicName" value="<?php echo $topic[$i]['name']?>"> <?php echo $topic[$i]['name'] ?> 
				</p>
			<?php } 
			endfor; ?>
 		</div>

	<?php } else{ ?>
	<p> New Post </p>
	<form name="contact" method="post" action="<?php echo base_url() . "/createPost"?>">
			<p>Title</p>
			<input type="text" name="title" value="<?php echo set_value('title'); ?>" size="50"/>
			<p>Content</p>
			<textarea rows="4" cols="50" name="content" value="<?php echo set_value('content'); ?>"></textarea>	
			<?php for($i = 0; $i < count($topic); $i++): ?>	
				<p> 
					<input type="radio" name="topicName" value="<?php echo $topic[$i]['name']?>" checked> <?php echo $topic[$i]['name'] ?> 
				</p>	
			<?php endfor; ?>
 		<?php } ?>
 		<br>
		<input type="submit" value="Submit" />
	</form>

	<div class="links">
		<?php if($this->session->typeUser === "Admin"){ 
			if( isset($post['content']) ){ ?>		
				<a href="<?php echo base_url() . "admin/post/" . $post['idPost'] ?>" > Go back </a>
			<?php } else{ ?>
				<a href="<?php echo base_url() . "admin" ?>" > Go back </a>
			<?php } 
		} else{ 
			if( isset($post['content']) ){ ?>
				<a href="<?php echo base_url() . "post/" . $post['idPost'] ?>" > Go back </a>
			<?php } else{ ?>
				<a href="<?php echo base_url() . "home" ?>" > Go back </a>
			<?php }
		} ?> 
	</div>
	
</div>
</body>
</html>