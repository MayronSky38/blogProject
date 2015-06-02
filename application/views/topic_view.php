<html>
<head>
	<title> Blog </title>
</head>
<body>
	<?php 	session_start(); ?>
	<h2><?php echo $title ?></h2>

	<table id ="topicTable">
		<thead>
			<tr>
				<th> <h1>Topic List</h1> </th>
				<th> <h1>Description</h1> </th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($topic as $topic_item): ?>
					<tr>
			        	<td> <h2><a href="/codeigniter/index.php/<?php echo strtolower($topic_item['name']) ?>"><?php echo $topic_item['name'] ?></a></h2> </td>
			            <td> <h3><?php echo $topic_item['description'] ?></h3> </td>
			        </tr>    
			<?php endforeach ?>
		</tbody>
	</table>
	<div class="login">
	<?php
	if( isset($_SESSION["nickName"]) ){
		echo "Logged as : " . $_SESSION["nickName"] . "(" . $_SESSION["typeUser"] .").";
		?>	
		<a href="/codeigniter/index.php/logout"> Logout </a> 
	<?php
	}  else{ ?>
		<a href="/codeigniter/index.php/login"> Login </a> 
	<?php } ?>
	</div>
</body>
</html>