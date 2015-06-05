<html lang="eng">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title> <?php echo $title ?> </title>

	<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js") ?>" ></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.dataTables.js") ?>" ></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/jquery.dataTables.css") ?>"/>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/Bootstrap/css/bootstrap.css") ?>"/>
	<script type="text/javascript" src="<?php echo base_url("assets/Bootstrap/js/bootstrap.js") ?>" ></script>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/style.css") ?>"/>
</head>
<body class="container-fluid">

<nav class="navbar navbar-fixed-top navbar-inverse">
	<div class="navbar-header">
		<p class="navbar-brand" style="font-weight:bold"> Welcome to my blog </p>
	</div>
	<ul class="nav navbar-nav navbar-right" style="margin-right:1%">  	
		<?php
		if( isset($test) ){ 
			if( $this->session->nickName != null ){ ?>
				<li><a href="<?php echo base_url("createPost") ?>"><span class="glyphicon glyphicon-plus"></span> Create new Post </a></li>
				<li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo "Logged as : " . $this->session->nickName . " (" . $this->session->typeUser .")."; ?> </a></li>
				<li><a href="<?php echo base_url() ."logout/" . $post['idPost'] ?>"><span class="glyphicon glyphicon-log-out"></span> Logout </a></li> 
			<?php
			}  else{ ?>
				<li><a href="<?php echo base_url() ."login/". $post['idPost'] ?>"><span class="glyphicon glyphicon-log-in"></span> Login </a></li> 
			<?php } 
		} else{ 
			if( $this->session->nickName != null ){ ?>
					<li><a href="<?php echo base_url("createPost") ?>"><span class="glyphicon glyphicon-plus"></span> Create new Post </a></li>
					<li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo "Logged as : " . $this->session->nickName . " (" . $this->session->typeUser .")."; ?> </a></li>
					<li><a href="<?php echo base_url("logout") ?>"><span class="glyphicon glyphicon-log-out"></span> Logout </a></li> 
				<?php
			}  else{ ?>
				<li><a href="<?php echo base_url("login") ?>"><span class="glyphicon glyphicon-log-in"></span> Login </a></li> 
			<?php }
		} ?>	
	</ul>
</nav>