<div class="container">

	<ul>
		<div class="post">
			<li style="color:blue"> <?php echo $post["title"] ?> </li>
			<li> <?php echo $post["content"] ?> </li>
			<li> By <?php echo $post["nickName"] ." at ". $post["publicDate"] ?> </li>
			<li>
			<?php if( ( ( ($this->session->nickName != null) && ($post["nickName"] === ($this->session->nickName)) ) || ($this->session->typeUser === "Admin") ) && ($post["banned"] == 0) ){ ?>
				<form action="<?php echo base_url() . "editPost/" . $post['idPost'] ?>">
						<input type="submit" value="Edit post">
				</form>
			<?php } else if ($post["banned"] != 0){?>
				<p> This post is banned </p>
			<?php } ?>
			</li>	
		</div>
		<?php if( ($this->session->nickName != null) && $post["banned"] == 0){ ?>
			<li> <a href="<?php echo base_url() . "createComent/" . $post['idPost'] ?>">  Coment this post </a> </li>
		<?php } ?>
	</ul>
		
	

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
				<?php } 
			    if( ($this->session->nickName != null) ){
			        if( ( ($coments[$i]["nickName"] === $this->session->nickName) || ($this->session->typeUser === "Admin") ) && ($coments[$i]["banned"] == 0) ){ ?>
					<li>
						<a href="<?php echo base_url() . "post/". $post['idPost'] . "/editComent/" . $coments[$i]['idComent']?>"> Edit coment </a>
					</li>			 
					<?php }
				} ?>
				</ul>
			<?php endfor; ?> 
		<?php } 	
		 else{ ?>
			<p> There are no coments for this post so far. </p>
		<?php } ?>
	</div>

	<div class="links">
		<a href="<?php echo base_url() . "home"?>"> Go back </a>
	</div>

</div>
</body>
</html>