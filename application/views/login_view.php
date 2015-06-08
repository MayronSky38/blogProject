<?php echo validation_errors(); ?>
<div class="container text-align-center" style="margin-top:10%;">	
	<?php if( isset($error) ){
	echo "<p class='col-md-offset-4'>".$error."</p>";
	} ?>
	<h3 class="col-md-offset-4"> Login </h3>
	<?php if( $idPost != null ){ ?>
		<form class="form-horizontal" name="contact" method="post" action="<?php echo base_url() ."login/" . $idPost ?> ">
	<?php } else{ ?>
		<form class="form-horizontal" name="contact" method="post" action="<?php echo base_url() ."login" ?> ">
	<?php } ?>
		<div class="form-group">
			<p class="col-md-offset-2 control-label col-md-2">Username</p>
			<div class="col-md-4"> 
				<input class="form-control" type="text" name="userName" value="<?php echo set_value('userName'); ?>" size="50"/>
			</div>
		</div>
		<div class="form-group">
			<p class="col-md-offset-2 control-label col-md-2">Password</p>
			<div class="col-md-4"> 
				<input class="form-control" type="password" name="password" value="<?php echo set_value('password'); ?>" size="50"/>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-offset-3 col-md-2">
				<input type="submit" value="Submit"/>
			</div>
		</div>
	</form>
</div>

	<div class="footer">
		<?php if( isset($idPost) ){ ?>
			<a href="<?php echo base_url() . "post/" . $idPost ?> "> Go back </a>
		<?php } else{ ?>
			<a href="<?php echo base_url() . "home" ?> "> Go back </a>
		<?php } ?>
	</div>

</body>
</html>