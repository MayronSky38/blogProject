<div class="container">
	<table id ="postTable" >
		<thead>
			<tr>
				<th> Title </th>
				<th> Published </th>
				<th> Author </th>
				<th> Last comment </th>
				<?php if( (isset($_SESSION["nickName"]) ) && $_SESSION["typeUser"] === "Admin"){ ?>
					<th></th>
					<th></th>
				<?php }?>
			</tr>
		</thead>
		<tbody>
			<?php for($i = 0; $i < count($posts); $i++): ?>
				<tr>
			        <td> <a href="<?php echo base_url() . strtolower($topic['name']) ?>/post/<?php echo $posts[$i]['idPost'] ?>"><?php echo $posts[$i]['title'] ?></a> </td>
			        <td> <?php echo $posts[$i]['publicDate'] ?> </td>
			        <td> <?php echo $user[$i]['nickName'] ?> </td>
			        <td> <?php echo $lastComent[$i]['publicDate'] . " by ". $lastComent[$i]['nickName'] ?> </td>
			        <?php if( (isset($_SESSION["nickName"]) ) && $_SESSION["typeUser"] === "Admin" ){
					?>
					<td><form action="<?php echo base_url() . strtolower($topic['name']) ?>/deletePost/<?php echo $posts[$i]['idPost']?>">
					    <input type="submit" value="Delete this post">
					</form></td>
					<?php if($posts[$i]['banned'] == 0){ ?>
						<td><form action="<?php echo base_url() . strtolower($topic['name']) ?>/banPost/<?php echo $posts[$i]['idPost']?>/1">
						    <input type="submit" value="Ban this post">
						</form>
						</td>		
					<?php } else{ ?>
						<td><form action="<?php echo base_url() . strtolower($topic['name']) ?>/banPost/<?php echo $posts[$i]['idPost']?>/0">
					    	<input type="submit" value="Not banned anymore">
						</form>
						</td>	
						<?php } 	 	 
					} ?>
				</tr>
			<?php endfor; ?>
		</tbody>
	</table>
</div>

	<div class="footer">
		<a href="<?php echo base_url("home") ?>" > Go back </a>
	</div>
</body>
</html>