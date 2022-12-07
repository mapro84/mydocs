<div class="h2title">
    <?php echo $skillname . " : " . $oneItem->name; ?>
</div>

<?php

echo "<ul>";
echo '<li>' . $oneItem->description . '</li>';
if(!is_null($oneItem->urls)) echo '<li><a href="'.$oneItem->urls.'" target="_blank">' . $oneItem->urls . '</a></li>';
if(!is_null($oneItem->further)) echo '<li><object data="data:application/pdf;base64,' . base64_encode($oneItem->further) . '" type="application/pdf" style="height:200px;width:100%"></object></li>';
echo "</ul>";

?>