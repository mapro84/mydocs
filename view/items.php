<div class="h2title">
    <?php echo $skillname; ?>
</div>

<?php

echo "<ul>";
foreach($items as $item):
    echo '<li><a href="index.php?page=item&itemid='.$item->id.'&skillname='.$skillname.'">'.$item->name.'</a></li>';
endforeach;
echo "</ul>";


?>