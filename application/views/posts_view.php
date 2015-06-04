<div class="container" style="margin-top:5%">
	<div class="well">
	<?php foreach ($links as $link) { ?>
			<?php echo $link; 
	} ?>
	</div>
	<?php for($i = 0; $i < count($post); $i++): ?>
	<div class="well">
		<h2><a href="<?php echo base_url() . "post/" . $post[$i]['idPost'] ?>"> <?php echo $post[$i]['title'] ?> </a></h2>
		<div class="jumbotron" style="text-align:center">		 
			<p> <?php echo $post[$i]['content']?> </p>
		</div>
		<div class="info">
	        <p> <?php echo $post[$i]['publicDate'] ?>
	        <?php echo $user[$i]['nickName'] ?> 
	        <?php if( isset($lastComentUser[$i]['nickName']) ){ ?>
	        	<?php echo "<br>Last Coment at: " . $post[$i]['lastDate'] . " by ". $lastComentUser[$i]['nickName'];?> </p> 
	    	<?php }else{ ?>
	    	 <?php echo "<br>".$lastComentUser[$i] ?> </p>
	    	<?php } ?>
	    </div>
        <?php if( ($this->session->nickName != null)  && $this->session->typeUser === "Admin" ){
		?>
			<div class="actions">
				<form action="<?php echo base_url() . "deletePost/" . $post[$i]['idPost']?>">
				    <input type="submit" value="Delete this post">
				</form>
				<?php if($post[$i]['banned'] == 0){ ?>
					<form action="<?php echo base_url() . "banPost/" . $post[$i]['idPost']?>/1">
					    <input type="submit" value="Ban this post">
					</form>
							
				<?php } else{ ?>
					<form action="<?php echo base_url() . "banPost/" . $post[$i]['idPost']?>/0">
				    	<input type="submit" value="Not banned anymore">
					</form>						
					<?php } ?>
			</div>	 	 
		<?php }	?>
			
	</div>
	<?php endfor;  ?>

	<div class="well">
		<?php foreach ($links as $link) { ?>
				<?php echo $link; 
		} ?>
	</div>

</div>
</body>
</html>