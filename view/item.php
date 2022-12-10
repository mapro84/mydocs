<div class="h2title">
	<?php
	echo $skillname . " : " . $oneItem->name;
	echo "<ul>";
	if(!is_null($oneItem->further)){ echo '<li><a href="./public/doc/'. $oneItem->further . '" target="_blank">' . $oneItem->description . '</a></li>'; }
	else { echo '<li>' . $oneItem->description . '</li>'; }
	if(!is_null($oneItem->urls)) echo '<li><a href="'.$oneItem->urls.'" target="_blank">' . $oneItem->urls . '</a></li>';
	echo "</ul>";
	?>
</div>
