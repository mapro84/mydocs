<div style="background-color: orange">
    Lessons page
<div>

<?php

echo "<ul>";
foreach($courses as $course):

    echo "<li>" . $course->title . "</li>";

endforeach;
echo "</ul>";


?>