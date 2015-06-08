<?php echo validation_errors(); ?>
<div class="container">	
	<?php if( isset($error) ){
	echo "<p>".$error."</p>";
	} ?>
	<h3> Login </h3>
	<?php if( $idPost != null ){ ?>
		<form name="contact" method="post" action="<?php echo base_url() ."login/" . $idPost ?> ">
	<?php } else{ ?>
		<form name="contact" method="post" action="<?php echo base_url() ."login" ?> ">
	<?php } ?>
			<p>Username</p>
			<input type="text" name="userName" value="<?php echo set_value('userName'); ?>" size="50"/>
			<p>Password</p>
			<input type="password" name="password" value="<?php echo set_value('password'); ?>" size="50"/>
			<br>
			<input type="submit" value="Submit"/>
	</form>
</div>

<div class="links">
	<?php if( isset($idPost) ){ ?>
			<a href="<?php echo base_url() . "post/" . $idPost ?> "> Go back </a>
	<?php } else{ ?>
			<a href="<?php echo base_url() . "home" ?> "> Go back </a>
	<?php } ?>
</div>

</body>
</html>