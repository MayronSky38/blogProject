<html>
<head>
	<title> Blog </title>
	<?php $this->load->helper('url'); ?>
	<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js") ?>" ></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.dataTables.js") ?>" ></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/jquery.dataTables.css") ?>"/>

	<script type="text/javascript"> 
	$(document).ready(function() {
	    $('#topicTable').DataTable({
	    	"order": [[ 0, "asc" ]]
	    });
	} );
	</script>
</head>
<body>
	<?php 	session_start(); ?>
	<h2><?php echo $title ?></h2>

	<table id="topicTable">
		<thead>
			<tr>
				<th> <h1>Topic List</h1> </th>
				<th> <h1>Description</h1> </th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($topic as $topic_item): ?>
					<tr>
			        	<td> <a href="<?php echo base_url() . strtolower($topic_item['name']) ?>"><?php echo $topic_item['idTopic'] .")". $topic_item['name'] ?></a> </td>
			            <td> <?php echo $topic_item['description'] ?> </td>
			        </tr>    
			<?php endforeach ?>
		</tbody>
	</table>
	<div class="login">
	<?php
	if( isset($_SESSION["nickName"]) ){
		echo "Logged as : " . $_SESSION["nickName"] . "(" . $_SESSION["typeUser"] .").";
		?>	
		<a href="<?php echo base_url("logout") ?> "> Logout </a> 
	<?php
	}  else{ ?>
		<a href="<?php echo base_url("login") ?> "> Login </a> 
	<?php } ?>
	</div>
</body>
</html>