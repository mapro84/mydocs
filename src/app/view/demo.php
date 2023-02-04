<?php
$demo = $entities['demo'];
$demoContent = $entities['demoContent'];

echo '<div class="demoTitle row mt-5">'.$demo->name . ': ' . $demo->description.'</div>';

echo '<br><br>';

echo $demoContent;

