<div class="h2title">
	<?php
	$item = $entities['item'];
	$skill_name = $entities['skill_name'];
	
	echo $skill_name . " : " . $item->name;
	echo "<ul>";
	if(!is_null($item->further)){ echo '<li><a href="./public/doc/'. $item->further . '" target="_blank">' . $item->description . '</a></li>'; }
	else { echo '<li>' . $item->description . '</li>'; }
	if(!is_null($item->url)) echo '<li><a href="'.$item->url.'" target="_blank">' . $item->url . '</a></li>';
	if(!is_null($item->urls)) echo '<li><a href="'.$item->urls.'" target="_blank">' . $item->urls . '</a></li>';
	echo "</ul>";
	?>
</div>
