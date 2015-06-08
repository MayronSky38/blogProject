<div class="container">

	<div class="post">
		<ul>
			<li> <?php echo $post["title"] ?> </li>
			<li> <?php echo $post["content"] ?> </li>
			<li> By <?php echo $post["nickName"] ." at ". $post["publicDate"] ?> </li>
		</ul>
	</div>
		
	<div class="coments">
		<p><?php echo validation_errors(); ?></p>
		<?php if( isset($comentToEdit['content']) ){ ?>
			<p> Edit Comment </p>
			<form name="contact" method="post" action="<?php echo base_url() . "post/". $post['idPost'] . "/editComent/" . $comentToEdit['idComent'] ?>">	
				<textarea rows="8" cols="160" name="content" value="<?php echo $comentToEdit['content'] ?>"><?php echo $comentToEdit['content'] ?></textarea>
		<?php } else{ ?>
			<p> New Comment </p>
			<form name="contact" method="post" action="<?php echo base_url() . "createComent/". $post['idPost']?>">
				<textarea rows="8" cols="160" name="content"></textarea>
		<?php } ?>
		<br>
		<input type="submit" value="Submit" />
		</form>
	</div>

	<div class="links">
		<?php if($this->session->typeUser === "Admin"){ ?>
			<a href="<?php echo base_url() . "admin/post/" . $post['idPost'] ?> "> Go back </a>
		<?php } else{ ?>
			<a href="<?php echo base_url() . "post/" . $post['idPost'] ?> "> Go back </a>
		<?php } ?>
	</div>

	<p> Coments </p>
	<div class="coments">
		<?php 
		if($coments != null){  ?>		
			<?php for($i = 0; $i < count($coments); $i++): ?>
				<ul class="comentsList">
				<li> <?php echo $coments[$i]['content'] ?> </li>
			    <li> <?php echo $coments[$i]['publicDate'] ?> </li>
			    <li> <?php echo $coments[$i]['nickName']?> </li>
			    
			    <?php  
					if ($coments[$i]["banned"] != 0 && $post["banned"] == 0){ ?>
					 <li> This coment is banned </li>
				<?php } ?>
				</ul>
			<?php endfor; ?> 
		<?php } 	
		 else{ ?>
			<p> There are no coments for this post so far. </p>
		<?php } ?>
	</div>
	
</div>
</body>
</html>