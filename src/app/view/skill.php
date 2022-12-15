<?php
use src\Core\Utils\Debug;
use src\Core\Utils\Check;

$skill = $entities['skill'];
$items = $entities['items'];

echo '<span><img src="./public/img/' . $skill->logo . '" alt="'.$skill->name.' Logo" height="45px"></span>';
echo '<form class="form-inline" method="post" action="index.php?page=deleteskill" ' .
       'onsubmit="return confirm(\'Do you confirm to delete ' . $skill->name . ' skill and possible items related?\');">' .
	   '<input type="hidden" name="skill_id" value='.$skill->id.'>' . 
	   '<button class="btn" ><i class="fa fa-trash"></i> Delete</button></form>';
// echo '<form class="form-inline" method="post" action="index.php?page=skills&action=updateskill">'.
// 	  '<input type="hidden" name="skill_id" value='.$skill->id.'/>' .
// 	  '<button class="btn"><i class="fa fa-edit"></i> Edit</button></form>';
echo '<form class="form-inline" method="post" action="index.php?page=skill&skill_id='.$skill->id.'&action=search">'.
      '<button class="btn" onclick="search()"><i class="fa fa-search"></i> search</button><input id="searchinput" class="btn-input"></form>';
echo "<hr>";

echo "<ul>";
foreach($items as $item):
if    (!is_null($item->further) && Check::isUrl($item->further)){ echo '<li><a href="'.$item->further .'" target="_blank">'.$item->name.'</a>  '. $item->description.'</li>'; }
elseif(!is_null($item->further) && Check::isPdf($item->further)){ echo '<li><a href="./public/doc/'.$item->further.'" target="_blank">'.$item->name.'  '.$item->description.'</a></li>'; }
//for long description without url or doc
else { echo '<li><a href="index.php?page=item&itemid='.$item->id.'&skill_name='.$skill->name.'">'.$item->name.'</a></li>'; }

endforeach;
echo "</ul>";
?>

<script>
function search() {
    if(checkIfEmpty(document.getElementById('searchinput').value)){
    	return false
    }else{
        alert('rr');
    }
}
</script>
