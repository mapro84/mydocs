<div class="container px-4 py-5" id="featured-3">
  <?php
	$messages = $entities['messages'] ?? [];
	$skills = $entities['skills'] ?? [];
	if(!empty($messages['info'])){ ?>
		<div class="alert alert-success" role="alert">
		<?php
					echo $messages['info'];
					?>
		</div>
  <?php }elseif(!empty($messages['error'])){ ?>
		<div class="alert alert-danger" role="alert">
			<?php
				echo $messages['error'];
			?>
		</div>
  <?php } ?>

	<div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
		<?php
		foreach($skills as $skill){
			echo '<div class="feature col">'
			.'<a href="index.php?page=skill&skill_id='.$skill->id.'" alt="'.$skill->name.'" class="icon-link d-inline-flex align-items-center">'
			.'<img src="public/img/'.$skill->logo.'" title="'.$skill->name.'"></a>' 
			.'</a></div>';
		}
		?>
	</div>
</div>
</body>
