<div class="h2title">
    <?php echo $oneSkill->name . ' Skill'; ?>
</div>

<?php

use src\classes\Utils\Debug;

echo "<ul>";
echo '<li>' . $oneSkill->name . '</li>';
echo '<li>' . $oneSkill->description . '</li>';
echo '<li>Level: ' . $oneSkill->level . '/5</li>';
echo '<li><img src="./public/img/' . $oneSkill->logo . '" alt="'.$oneSkill->name.' Logo" width="125px"></li>';
if(!is_null($oneSkill->further)) echo '<li><object data="data:application/pdf;base64,' . base64_encode($oneSkill->further) .'" type="application/pdf" style="height:200px;width:100%"></object></li>';
echo '<li><a href="index.php?page=items&skillid='.$oneSkill->id.'&skillname='.$oneSkill->name.'">Items</a></li>';
echo "</ul>";

?>