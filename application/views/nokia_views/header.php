<html lang="eng">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title> <?php echo $title ?> </title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/style_nokia.css") ?>"/>
</head>
<body>
	<ul class="options" style="margin-right:1%">  	
		<?php
		if( isset($test) ){ 
			if( $this->session->nickName != null ){ ?>
				<li><a href="<?php echo base_url("createPost") ?>"> Create new Post </a></li>
				<li><a href="#"> <?php echo "Logged as : " . $this->session->nickName . " (" . $this->session->typeUser .")."; ?> </a></li>
				<li><a href="<?php echo base_url() ."logout/" . $post['idPost'] ?>"> Logout </a></li> 
			<?php
			}  else{ ?>
				<li><a href="<?php echo base_url() ."login/". $post['idPost'] ?>"> Login </a></li> 
			<?php } 
		} else{ 
			if( $this->session->nickName != null ){ ?>
					<li><a href="<?php echo base_url("createPost") ?>"> Create new Post </a></li>
					<li><a href="#">  <?php echo "Logged as : " . $this->session->nickName . " (" . $this->session->typeUser .")."; ?> </a></li>
					<li><a href="<?php echo base_url("logout") ?>"> Logout </a></li> 
				<?php
			}  else{ ?>
				<li><a href="<?php echo base_url("login") ?>"> Login </a></li> 
			<?php }
		} ?>	
	</ul>