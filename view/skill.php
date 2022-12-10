<div class="h2title">
<?php

use src\Core\Utils\Debug;
echo '<img src="./public/img/' . $oneSkill->logo . '" alt="'.$oneSkill->name.' Logo" height="45px">';
echo "<hr>";
echo "<ul>";
echo '<li>' . $oneSkill->description . '</li>';
if(!is_null($oneSkill->further)) echo '<li><object data="data:application/pdf;base64,' . base64_encode($oneSkill->further) .'" type="application/pdf" style="height:200px;width:100%"></object></li>';
echo '<li><a href="index.php?page=items&skillid='.$oneSkill->id.'&skillname='.$oneSkill->name.'">Items</a></li>';
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
			echo '<li><a href="index.php?page='.$demo->name.'demo" target="_blank">'.ucfirst($demo->name).' Demo</a></li>';
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