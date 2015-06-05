<div class="container" style="margin-top:5%">

	<div class="well">
		<h2> <?php echo $post["title"] ?> </h2>
		<div  class="jumbotron">
			<p> <?php echo $post["content"] ?> </p>
		</div>
		<div style="text-align:left">
			<p> By <?php echo $post["nickName"] ." at ". $post["publicDate"] ?> </p>
		</div>
	</div>
		
	<div class="container text-align-center" style="margin-top:10%;">
		<p><?php echo validation_errors(); ?></p>
		<?php if( isset($comentToEdit['content']) ){ ?>
		<h3 class="col-md-offset-4"> Edit Comment </h3>
		<form class="form-horizontal" name="contact" method="post" action="<?php echo base_url() . "post/". $post['idPost'] . "/editComent/" . $comentToEdit['idComent'] ?>">
			<div class="form-group">				
					<textarea rows="8" cols="160" name="content" value="<?php echo $comentToEdit['content'] ?>"> <?php echo $comentToEdit['content'] ?></textarea>
				<?php } else{ ?>
		<h3 class="col-md-offset-4"> New Comment </h3>
		<form class="form-horizontal" name="contact" method="post" action="<?php echo base_url() . "createComent/". $post['idPost']?>">
			<div class="form-group">
					<textarea rows="8" cols="160" name="content"></textarea>
				<?php } ?>
			</div>	
			<div class="form-group">
				<div class="col-md-offset-4 col-md-2">
					<input type="submit" value="Submit" />
				</div>
			</div>
		</form>
	</div>

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
			<?php } ?>
		</div>
		<?php endfor; } 	
	else{ ?>
		<p> There are no coments for this post so far. </p>
	<?php } ?>
	</fieldset>
</div>
<div class="footer">
	<a href="<?php echo base_url() . "post/" . $post['idPost'] ?> "> Go back </a>
</div>
</body>
</html>