<div style="background-color: orange">
    My consequent Skills
<div>

<?php

echo "<ul>";
foreach($skills as $skill):

    echo "<li>" . $skill->title . "</li>";

endforeach;
echo "</ul>";


?>