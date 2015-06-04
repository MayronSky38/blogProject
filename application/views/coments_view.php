<div class="container" style="margin-top:5%">

	<div class="well">
		<h2> <?php echo $post["title"] ?> </h2>
		<div  class="jumbotron">
			<p> <?php echo $post["content"] ?> </p>
		</div>
		<div style="text-align:left">
			<p> By <?php echo $post["nickName"] ." at ". $post["publicDate"] ?> </p>
		</div>
		<?php if( ( ( ($this->session->nickName != null) && ($post["nickName"] === ($this->session->nickName)) ) || ($this->session->typeUser === "Admin") ) && ($post["banned"] == 0) ){ ?>
			<form action="<?php echo base_url() . "/editPost/" . $post['idPost'] ?>">
					<input type="submit" value="Edit post">
			</form>
		<?php } else if ($post["banned"] != 0){?>
			<p> This post is banned </p>
		<?php } 
		if( ($this->session->nickName != null)  && $this->session->typeUser === "Admin" ){
		?>
			<div class="actions">
				<form action="<?php echo base_url() . "deletePost/" . $post['idPost']?>">
				    <input type="submit" value="Delete this post">
				</form>
				<?php if($post['banned'] == 0){ ?>
					<form action="<?php echo base_url() . "banPost/" . $post['idPost']?>/1">
					    <input type="submit" value="Ban this post">
					</form>
							
				<?php } else{ ?>
					<form action="<?php echo base_url() . "banPost/" . $post['idPost']?>/0">
				    	<input type="submit" value="Not banned anymore">
					</form>						
					<?php } ?>
			</div>	 	 
		<?php }	?>		
	</div>
		
	<?php if( ($this->session->nickName != null) && $post["banned"] == 0){
	?>
	<form action="<?php echo base_url() . "/createComent/" . $post['idPost'] ?>">
	    <input type="submit" value="Coment this post">
	</form>
	<?php } ?>

	<fieldset>
		<legend> Coments </legend>
	<?php 
	if($coments != null){  
		for($i = 0; $i < count($coments); $i++): ?>
		<div class="well">
			<div class="jumbotron" style="text-align:left">
			    <p><?php echo $coments[$i]['content'] ?></p>
			</div>
		    <p><?php echo $coments[$i]['publicDate'] ?>
		    <?php echo $coments[$i]['nickName']?> </p>
		    
		    <?php  
				if ($coments[$i]["banned"] != 0 && $post["banned"] == 0){ ?>
				 <td> <h4>This coment is banned</h4> </td>
			<?php } 
		    if( ($this->session->nickName != null) ){
		        if( ( ($coments[$i]["nickName"] === $this->session->nickName) || ($this->session->typeUser === "Admin") ) && ($coments[$i]["banned"] == 0) ){ ?>
				<form action="<?php echo base_url() . strtolower($post['name']) ."/". $post['idPost'] . "/editComent/" . $coments[$i]['idComent']?>?>">
			   		<input type="submit" value="Edit coment">
				</form>
				 
				<?php }
				if( ($this->session->typeUser === "Admin") && ($coments[$i]["banned"] == 0) ){ ?>
					<form action="<?php echo base_url() ."/". $post['idPost'] . "/deleteComent/". $coments[$i]['idComent']?>">
					    <input type="submit" value="Delete this coment">
					</form>
					<?php }
					if( ($this->session->typeUser === "Admin") && $post["banned"] == 0){
						if($coments[$i]['banned'] == 0){ ?>
							<form action="<?php echo base_url() ."/". $post['idPost'] . "/banComent/" . $coments[$i]['idComent']?>/1">
							    <input type="submit" value="Ban this coment">
							</form>		
						<?php } else{ ?>
							<form action="<?php echo base_url() ."/". $post['idPost'] . "/banComent/" . $coments[$i]['idComent']?>/0">
						    	<input type="submit" value="Not banned anymore">
							</form>	
						<?php } 
					}
			} ?>
		</div>
		<?php endfor; } 	
	else{ ?>
		<p> There are no coments for this post so far. </p>
	<?php } ?>
	</fieldset>
</div>
	<div class="footer">
		<a href="<?php echo base_url() . "/home"?> "> Go back </a>
	</div>
</body>
</html>