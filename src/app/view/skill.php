<div class="h2title">
<?php
use src\Core\Utils\Debug;

$skill = $entities['skill'];
$demos = $entities['demos'];
$urls = $entities['urls'];

echo '<span><img src="./public/img/' . $skill->logo . '" alt="'.$skill->name.' Logo" height="45px"></span>';
echo '<form class="form-inline" method="post"><button class="btn" onclick="search()"><i class="fa fa-search"></i> search</button><input class="btn-input"></form>';
echo '<form class="form-inline" method="post"><button class="btn" onclick="updateskill(2,\'python\')"><i class="fa fa-edit"></i> Edit</button></form>';
echo '<form name="delskill" class="form-inline" method="post" action="index.php?page=skills&action=deleteskill ' .
       '"onsubmit="return confirm(\'Do you confirm to delete ' . $skill->name . ' skill?\');">' .
	   '<input type="hidden" name="skill_id" value='.$skill->id.'/>' . 
	   '<button class="btn" ><i class="fa fa-trash"></i> Delete</button>' . 
	  '</form>';

//onclick="deleteskill(1,\'php\')"
// action="index.php?page=skills&action=deleteskill&skill_id='.$skill->id.'"
// onclick="deleteskill(1,\'php\')"

echo "<hr>";
echo "<ul>";
echo '<li>' . $skill->description . '</li>';
if(!is_null($skill->further)) echo '<li><object data="data:application/pdf;base64,' . base64_encode($skill->further) .'" type="application/pdf" style="height:200px;width:100%"></object></li>';
echo '<li><a href="index.php?page=items&skill_id='.$skill->id.'&skill_name='.$skill->name.'">Items</a></li>';
echo "</ul>";
?>

<!-- action="index.php?page=skills&action=deleteskill&skill_id='.$skill->id.'" -->

<script>
function deleteskill(id,name) {
	
    answer = confirm("Are you sure to delete the skill "+name);
    console.debug(document.write("Name: " + document.forms[0].name.value + "<br>");)
    if(answer == true) {
        alert('next');
        window.location.href = "index.php?page=skills&action=deleteskill&skill_id=3";
        return false;
    }
}

function updateskill(id,name) {
    confirm("update skill "+name+id);
}

function search() {
    confirm("search action");
}
</script>

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