<body>

<?php echo validation_errors(); ?>
<div class="container text-align-center" style="margin-top:10%;">
	<h3 class="col-md-offset-4"> Login </h3>
	<form class="form-horizontal" name="contact" method="post" action="<?php echo base_url() ."login"?> ">
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

</body>
</html>