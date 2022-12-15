<ul class="displaySkills">
<?php
// var_dump($entities);
$infos = $entities['infos'];
$errorss = $entities['errors'];
$skills = $entities['skills'];

foreach($skills as $skill){
// 	echo '<li class="list"><img src="public/img/'.$skill->logo.'"><a href=index.php?page=skill&skill_id='.$skill->id.'>'.$skill->name.'</a></li>';
 	echo '<li class="list"><a href=index.php?page=skill&skill_id='.$skill->id.'><img src="public/img/'.$skill->logo.'" title="'.$skill->name.'"></a></li>';
}
?>
</ul>