<!--<?php
$this->load->helper('url');
// Include the autoloader - edit this path!
require_once ("assets/WurlfCloudClient/src/autoload.php");
 
// Create a configuration object 
$config = new ScientiaMobile\WurflCloud\Config();

// Set your WURFL Cloud API Key 
$config->api_key = '227093:sGFS27UhTvDzAZIr6KQlBkJoWgpy91nd';
// Create the WURFL Cloud Client 
$client = new ScientiaMobile\WurflCloud\Client($config); 
 
// Detect your device 
$client->detectDevice(); 
 
// Use the capabilities 
if($client->getDeviceCapability('is_smartphone')){
	echo "Is a smartphone";
}
else{
	echo "It isn't a smartphone";
}
?> -->
<html lang="en">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Blog </title>
	<?php  ?>
	<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js") ?>" ></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.dataTables.js") ?>" ></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/jquery.dataTables.css") ?>"/>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/Bootstrap/css/bootstrap.css") ?>"/>
	<script type="text/javascript" src="<?php echo base_url("assets/Bootstrap/js/bootstrap.js") ?>" ></script>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/style.css") ?>"/>

	<script type="text/javascript"> 
	$(document).ready(function() {
	    $('#topicTable').DataTable({
	    	"order": [[ 0, "asc" ]]
	    });
	} );
	</script>
</head>
<body class="container-fluid">
	<?php 	session_start(); ?>
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

	<div class="title">
	<h3><?php echo $title ?></h3>
	</div>
	

<div class="container">
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
</div>
</body>
</html>