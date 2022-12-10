<div class="h2title">
	<ul>
		<?php
		
		echo 'POST';
		var_dump($_POST);
		
		foreach($skills as $skill):
		    echo "<li>" . $skill->url . "</li>";
		endforeach;
		?>
	</ul>
</div>