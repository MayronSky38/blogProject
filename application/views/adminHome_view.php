<script type="text/javascript"> 
	$(document).ready(function() {
	    $('#postTable').DataTable( {
	    	"order": [[ 3, "desc" ]]
	    });
	} );
</script>

<div class="container" style="margin-top:5%">
	<table id ="postTable">
		<thead>
			<tr>
				<th> Title </th>
				<th> Published </th>
				<th> Author </th>
				<th> Last comment </th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php for($i = 0; $i < count($post); $i++): ?>
				<tr>
			        <td> <a href="<?php echo base_url() .'admin/post/' . $post[$i]['idPost']?>"> <?php echo $post[$i]['title'] ?> </a> </td>
			        <td> <?php echo $post[$i]['publicDate'] ?> </td>
			        <td> <?php echo $user[$i]['nickName'] ?> </td>
			        <?php if( isset($lastComentUser[$i]['nickName']) ){ ?>
			        	<td> <?php echo $post[$i]['lastDate'] . " by ". $lastComentUser[$i]['nickName'] ?> </td>
			        <?php } else{ ?>
			        	<td> <?php echo $post[$i]['lastDate'] ?> </td>
			        <?php } ?>
					<td><form action="<?php echo base_url() .'/deletePost/'. $post[$i]['idPost']?>">
					    <input type="submit" value="Delete this post">
					</form></td>
					<?php if($post[$i]['banned'] == 0){ ?>
						<td><form action="<?php echo base_url() . '/banPost/' . $post[$i]['idPost']?>/1">
						    <input type="submit" value="Ban this post">
						</form>
						</td>		
					<?php } else{ ?>
						<td><form action="<?php echo base_url() . '/banPost/' . $post[$i]['idPost']?>/0">
					    	<input type="submit" value="Not banned anymore">
						</form>
						</td>	
						<?php } ?>
				</tr>
			<?php endfor; ?>
		</tbody>
	</table>
</div>
</body>
</html>