<div class="container px-4 py-5" id="featured-3">
<div class="row g-4 py-5 row-cols-1 row-cols-lg-12">
<?php

$admin = getenv('admin');

use src\Core\Utils\Debug;

$notes = $entities['notes'];
foreach ($notes as $note):
echo '<div class="col">';
$deleteButton = '<form class="form-inline" method="post" action="index.php?page=deletenote" ' .
'onsubmit="return confirm(\'Do you confirm to delete ' . $note->name. ' note?\');">' .
'<input type="hidden" name="note_id" value='.$note->id.'>' . 
'<button class="btn" ><i class="fa fa-trash fa-2xs"></i></button></form>';
echo $admin === 'true' ? $deleteButton : '';
  echo '<span class="text-row" >';
echo '<span class="subtitle">'.$note->name.': </span>';
echo $note->description;
echo '</span></div>';
endforeach;
?>
</div>
</div>
