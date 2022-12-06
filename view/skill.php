<div class="h2title">
    <?php echo $oneSkill->title . ' Skill'; ?>
</div>

<?php

echo "<ul>";
echo '<li>' . $oneSkill->title . '</li>';
echo '<li>' . $oneSkill->description . '</li>';
echo '<li>Level: ' . $oneSkill->level . '/5</li>';
echo '<li><img src="./public/img/' . $oneSkill->logo . '" alt="'.$oneSkill->title.' Logo" width="125px"></li>';
echo "</ul>";

?>