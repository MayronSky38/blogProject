<div class="container">
		<?php for($i = 0; $i < count($post); $i++): ?>
		<div class="post">
			<ul>
			<li> <a href="<?php echo base_url() . "post/" . $post[$i]['idPost'] ?>"> <?php echo $post[$i]['title'] ?> </a></li>		 
			<li> <?php echo $post[$i]['content']?> </li>
			<div class="info">
		        <li> <?php echo $post[$i]['publicDate'] ?> </li>
		        <li><?php echo $user[$i]['nickName'] ?> </li>
		        <li><?php if( isset($lastComentUser[$i]['nickName']) ){ ?>
		        	<?php echo "<br>Last Coment at: " . $post[$i]['lastDate'] . " by ". $lastComentUser[$i]['nickName'];?>
		    	<?php }else{ ?>
		    	 <?php echo "<br>".$lastComentUser[$i] ?> 
		    	<?php } ?> </li>
		    </div>		
		</div>
		<?php endfor;  ?>
	</ul>
	<div class="links">
		<ul>
			<?php foreach ($links as $link) { ?>
				<li> <?php echo $link; ?> </li>
			<?php } ?>
		</ul>
	</div>

</div>
</body>
</html>