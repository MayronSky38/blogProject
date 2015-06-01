<html>
<head>
<title>Login</title>
</head>
<body>

<?php echo validation_errors(); ?>

<form name="contact" method="post" action="/codeigniter/index.php/login">

<h5>Username</h5>
<input type="text" name="userName" value="<?php echo set_value('userName'); ?>" size="50"/>

<h5>Password</h5>
<input type="password" name="password" value="<?php echo set_value('password'); ?>" size="50"/>

<div><input type="submit" value="Submit" /></div>

</form>

</body>
</html>