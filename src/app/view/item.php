<?php
use src\Core\Utils\Check;
$item = $entities['item'];
$demos = $entities['demos'];
$urls = $entities['urls'];
$skill_name = $entities['skill_name'];
?>

<div class="container px-4 py-5" id="featured-3">
<div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="head-menu collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav mr-auto">

<?php
echo '<div class="col-10">'.$skill_name . " : " . $item->name . '</div>';

echo '<div class="col-1"><form class="form-inline" method="post" action="index.php?page=deleteitem" ' .
		'onsubmit="return confirm(\'Do you confirm to delete ' . $item->name . ' item and possible urls and demos?\');">' .
		'<input type="hidden" name="item_id" value='.$item->id.'>' .
		'<button class="btn" ><i class="fa fa-trash"></i></button></form></div>';

echo '<div class="col-1"><form class="form-inline" method="post" action="index.php?page=edititem">'.
		'<input type="hidden" name="item_id" value='.$item->id.'/>' .
		'<button class="btn"><i class="fa fa-edit"></i></button></form></div>';

// echo '<div class="col-1"><form class="form-inline" method="post" action="index.php?page=item&item_id='.$item->id.'&action=search">'.
// 		'<button class="btn" onclick="search()"><i class="fa fa-search"></i> search</button><input id="searchinput" class="btn-input"></form></div>';

// echo "<hr>";
?>

</ul>
</div>
</nav>
</div>
</div>

<?php

echo "<div class='row'>";
if    (!is_null($item->further) && Check::isUrl($item->further)){ echo '<div class="col"><a href="'.$item->further .'" target="_blank">'.$item->description.'</a></div>'; }
elseif(!is_null($item->further) && Check::isPdf($item->further)){ echo '<div class="col"><a href="./public/doc/'.$item->further.'" target="_blank">'.$item->description.'</a></div>'; }
else  { echo '<div class="col">' . $item->description . '</div>'; }
echo "</div>";

$numberDemos = count($demos);
if($numberDemos>0){
?>
<div class="container px-4 py-5" id="featured-3">
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
</div>
<?php
}
?>

<?php
$numberUrls = count($urls);
if($numberUrls>0){
?>
<div class="container px-4 py-5" id="featured-3">
<ul>
	<li class="remove-bullet">Related Urls</li>
	<ul>
	<?php
		foreach($urls as $url){
			echo '<li><a href="'.$url->url.'" target="_blank">'.$url->name.'</a></li>';
		}
	?>
	</ul>
</ul>
</div>
<?php
}
?>