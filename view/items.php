<div style="background-color: orange">
    $title
</div>

<?php

echo "<ul>";
foreach($skills as $skill):
    echo $skill->url;
endforeach;
echo "</ul>";


?>