<?php 
$notes = $entities['notes'];

echo "<ul>";
foreach($notes as $note):
echo '<li><a href="index.php?page=note&noteid='.$note->id.'">'.$note->name.'</a>: '.$note->description.'</li>';
endforeach;
echo "</ul>";

?>
