<html>
<head>
	<title> Coments for  <?php echo $post["title"]?></title>
	<?php $this->load->helper('url'); ?>
	<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js") ?>" ></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.dataTables.js") ?>" ></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/jquery.dataTables.css") ?>"/>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/Bootstrap/css/bootstrap.css") ?>"/>
	<script type="text/javascript" src="<?php echo base_url("assets/Bootstrap/js/bootstrap.js") ?>" ></script>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/style.css") ?>"/>

	<script type="text/javascript"> 
	$(document).ready(function() {
	    $('#comentsTable').DataTable( {
	    	"order": [[ 1, "desc" ]]
	    });
	} );
	</script>
</head>
<body class="container-fluid">
	<?php session_start(); ?>

	<div class="login">
		<?php
		if( isset($_SESSION["nickName"]) ){
			echo "Logged as : " . $_SESSION["nickName"] . "(" . $_SESSION["typeUser"] .").";
			?>	
			<a href="<?php echo base_url("logout") ."/". strtolower($post['name']) ."/". $post['idPost']?>"> Logout </a> 
		<?php
		}  else{ ?>
			<a href="<?php echo base_url("login") ."/". strtolower($post['name']) ."/". $post['idPost']?>"> Login </a> 
		<?php } ?>
	</div>

	<div class="title">
	<h3> <?php echo $post["name"]  ." -> " . $post["title"] ?> </h3>
	</div>
<div class="container">
	
		<div  class="postContent">
		<p> <?php echo $post["content"] ?> </p>
			<div style="text-align:left">
			<p> By <?php echo $post["nickName"] ?> at <?php echo $post["publicDate"] ?> </p>
			</div>
		</div>
		<?php if( ( isset($_SESSION["nickName"]) ) && ($post["nickName"] === $_SESSION["nickName"] || $_SESSION["typeUser"] === "Admin") && ($post["banned"] == 0) ){?>
		<form action="<?php echo base_url() . strtolower($post['name']) . "/" . $post['idPost'] ?>/editPost">
	   		<input type="submit" value="Edit post">
		</form>
		<?php } else if ($post["banned"] != 0){?>
		<p> This post is banned </p>
		<?php } ?>		
		
		

		<?php if( (isset($_SESSION["nickName"])) && $post["banned"] == 0){
		?>
		<form action="<?php echo base_url() .  strtolower($post['name']) . "/" . $post['idPost'] ?>/createComent">
		    <input type="submit" value="Coment this post">
		</form>
		<?php } ?>

	<fieldset>
		<legend> Coments </legend>
		<table id ="comentsTable" >		
	<?php 
	if( $coments != null ){ ?>
		<thead>
			<tr>
				<th> Content </th>
				<th> Published </th>
				<th> Author </th>
				<th> </th> 
				<?php if( (isset($_SESSION["nickName"]) ) && $_SESSION["typeUser"] === "Admin"){ ?>
					<th></th>
					<th></th>
				<?php }?>
			</tr>
		</thead>
		<tbody>
		<?php for($i = 0; $i < count($coments); $i++): ?>
			<tr>
		        <td class="postContent"> <h3><?php echo $coments[$i]['content'] ?></a></h3> </td>
		        <td> <h4><?php echo $coments[$i]['publicDate'] ?></h4> </td>
		        <td> <h4><?php echo $coments[$i]['nickName']?></h4> </td>
		        
		        <?php  
					if ($coments[$i]["banned"] != 0 && $post["banned"] == 0){ ?>
					 <td> <h4>This coment is banned</h4> </td>
				<?php } 
		        if( isset($_SESSION["nickName"]) ){
			        if( ($coments[$i]["nickName"] === $_SESSION["nickName"] || $_SESSION["typeUser"] === "Admin") && ($coments[$i]["banned"] == 0) ){ ?>
					<td><form action="<?php echo base_url() . strtolower($post['name']) ."/". $post['idPost'] . "/editComent/" . $coments[$i]['idComent']?>?>">
				   		<input type="submit" value="Edit coment">
					</form></td>
					 
					<?php }
					else { ?>
						<td> </td>
					<?php }
					if( $_SESSION["typeUser"] === "Admin" && ($coments[$i]["banned"] == 0) ){
					?>
						<td><form action="<?php echo base_url() .  strtolower($post['name']) ?>/<?php echo $post['idPost']?>/deleteComent/<?php echo $coments[$i]['idComent']?>">
						    <input type="submit" value="Delete this coment">
						</form></td>
						<?php }
						if($_SESSION["typeUser"] === "Admin" && $post["banned"] == 0){
							if($coments[$i]['banned'] == 0){ ?>
								<td><form action="<?php echo base_url() .  strtolower($post['name']) ."/". $post['idPost'] . "/banComent/" . $coments[$i]['idComent']?>/1">
								    <input type="submit" value="Ban this coment">
								</form></td>		
							<?php } else{ ?>
								<td><form action="<?php echo base_url() .  strtolower($post['name']) ."/". $post['idPost'] . "/banComent/" . $coments[$i]['idComent']?>/0">
							    	<input type="submit" value="Not banned anymore">
								</form></td>	
								<?php } 
						}
				} else{?>			
					<td> </td>
				<?php } ?>
				</tr>
		<?php endfor; 
	}
		else{
			?>
			<thead>
				<tr>
					<th> </th>
				</tr>
			</thead>
			<tbody>
			<tr>
				<td> There are no coments for this post so far. </td>
			</tr>
		<?php } ?>
			</tbody>
	</table>
	</fieldset>
</div>

	<div class="footer">
		<a href="<?php echo base_url() . strtolower($post['name'])?> "> Go back </a>
	</div>
</body>
</html>