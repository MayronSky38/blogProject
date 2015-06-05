<script type="text/javascript"> 
	$(document).ready(function() {
	    $('#comentsTable').DataTable( {
	    	"order": [[ 1, "desc" ]]
	    });
	} );
</script>

<div class="container" style="margin-top:5%">
	<form action="<?php echo base_url() . "createComent/" . $post['idPost'] ?>">
	    <input type="submit" value="Coment this post">
	</form>
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
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		<?php for($i = 0; $i < count($coments); $i++): ?>
			<tr>
		        <td class="postContent"> <?php echo $coments[$i]['content'] ?></a> </td>
		        <td> <?php echo $coments[$i]['publicDate'] ?> </td>
		        <td> <?php echo $coments[$i]['nickName']?> </td>		       
				<td><form action="<?php echo base_url() ."post/" . $post['idPost'] . "/editComent/" . $coments[$i]['idComent'] ?>">
			   		<input type="submit" value="Edit coment">
				</form></td>
					<td><form action="<?php echo base_url() .  "post/" . $post['idPost'] . "/deleteComent/" . $coments[$i]['idComent'] ?>">
					    <input type="submit" value="Delete this coment">
					</form></td>
					<?php if($post["banned"] == 0){
						if($coments[$i]['banned'] == 0){ ?>
							<td><form action="<?php echo base_url()  . "post/" . $post['idPost'] . "/banComent/" . $coments[$i]['idComent']?>/1">
							    <input type="submit" value="Ban this coment">
							</form></td>		
						<?php } else{ ?>
							<td><form action="<?php echo base_url()  . "post/" . $post['idPost'] . "/banComent/" . $coments[$i]['idComent']?>/0">
						    	<input type="submit" value="Not banned anymore">
							</form></td>	
						<?php } 
						} ?>
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
		<a href="<?php echo base_url() ."admin" ?> "> Go back </a>
	</div>
</body>
</html>

