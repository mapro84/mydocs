<div class="h2title">
	<?php
	$items = $entities['items'];
	$skill_name = $entities['skill_name'];
	echo $skill_name; 
	echo "<ul>";
	foreach($items as $item):
	    echo '<li><a href="index.php?page=item&itemid='.$item->id.'&skill_name='.$skill_name.'">'.$item->name.'</a></li>';
	endforeach;
	echo "</ul>";
	?>
</div>