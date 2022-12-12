<div class="h2title">
<?php
$item = $entities['item'];
$demos = $entities['demos'];
$urls = $entities['urls'];

$skill_name = $entities['skill_name'];

echo '<span>'.$skill_name . " : " . $item->name . '</span>';

echo '<form class="form-inline" method="post" action="index.php?page=deleteitem" ' .
		'onsubmit="return confirm(\'Do you confirm to delete ' . $item->name . ' item and possible urls and demos?\');">' .
		'<input type="hidden" name="item_id" value='.$item->id.'>' .
		'<button class="btn" ><i class="fa fa-trash"></i> Delete</button></form>';

echo '<form class="form-inline" method="post" action="index.php?page=items&action=updateitem">'.
		'<input type="hidden" name="item_id" value='.$item->id.'/>' .
		'<button class="btn"><i class="fa fa-edit"></i> Edit</button></form>';

echo '<form class="form-inline" method="post" action="index.php?page=item&item_id='.$item->id.'&action=search">'.
		'<button class="btn" onclick="search()"><i class="fa fa-search"></i> search</button><input id="searchinput" class="btn-input"></form>';

echo "<hr>";
echo "<ul>";
if(!is_null($item->further)){ echo '<li><a href="./public/doc/'. $item->further . '" target="_blank">' . $item->description . '</a></li>'; }
else { echo '<li>' . $item->description . '</li>'; }
if(!is_null($item->url)) echo '<li><a href="'.$item->url.'" target="_blank">' . $item->url . '</a></li>';
if(!is_null($item->urls)) echo '<li><a href="'.$item->urls.'" target="_blank">' . $item->urls . '</a></li>';
echo "</ul>";
?>
</div>

<?php
$numberDemos = count($demos);
if($numberDemos>0){
?>
<ul>
	<li class="remove-bullet">Demos</li>
	<ul>
	<?php
		foreach($demos as $demo){
			echo '<li><a href="index.php?page=demo&demo_id='.$demo->id.'" target="_blank">'.ucfirst($demo->name).' Demo</a></li>';
		}
	?>
	</ul>
</ul>
<?php
}
?>

<?php
$numberUrls = count($urls);
if($numberUrls>0){
?>
<ul>
	<li class="remove-bullet">Further Information</li>
	<ul>
	<?php
		foreach($urls as $url){
			echo '<li><a href="'.$url->url.'" target="_blank">'.$url->name.'</a></li>';
		}
	?>
	</ul>
</ul>
<?php
}
?>