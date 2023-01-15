<div class="container px-4 py-5" id="featured-3">
	<div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
		<?php
		$infos = $entities['infos'];
		$errorss = $entities['errors'];
		$skills = $entities['skills'];
		foreach($skills as $skill){
			echo '<div class="feature col">'
			.'<a href="index.php?page=skill&skill_id='.$skill->id.'" class="icon-link d-inline-flex align-items-center">'
			.'<img src="public/img/'.$skill->logo.'" title="'.$skill->name.'"></a>' 
			.'</a></div>';
			// 	echo '<li class="list"><img src="public/img/'.$skill->logo.'"><a href=index.php?page=skill&skill_id='.$skill->id.'>'.$skill->name.'</a></li>';
			//echo '<li class="list"><a href=index.php?page=skill&skill_id='.$skill->id.'><img src="public/img/'.$skill->logo.'" title="'.$skill->name.'"></a></li>';
		}
		?>
	</div>
</div>


<?php

//$memc = new \Memcache;
//$memc->addServer('localhost','11211');

// if(empty($_POST['film'])) {


// $memc = new \Memcache;
// $memc->addServer('localhost','11211');

// if(empty($_POST['film'])) {
?>
  <!-- <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Simple Memcache Lookup</title>
    </head>
    <body>
      <form method="post">
        <p><b>Film</b>: <input type="text" size="20" name="film"></p>
        <input type="submit">
      </form>
      <hr/> -->
<?php

// }
/*
else {

    echo "Loading data...\n";

    $film   = htmlspecialchars($_POST['film'], ENT_QUOTES, 'UTF-8');
    $mfilms = $memc->get($film);

    if ($mfilms) {

        printf("<p>Film data for %s loaded from memcache</p>", $mfilms['title']);

        foreach (array_keys($mfilms) as $key) {
            printf("<p><b>%s</b>: %s</p>", $key, $mfilms[$key]);
        }

    } else {

        $mysqli = mysqli('localhost','root','<replaceable>mysql</replaceable>','skills');

        if (mysqli_connect_error()) {
            sprintf("Database error: (%d) %s", mysqli_connect_errno(), mysqli_connect_error());
            exit;
        }

        $sql = sprintf('SELECT * FROM film WHERE title="%s"', $mysqli->real_escape_string($film));

        $result = $mysqli->query($sql);

        if (!$result) {
            sprintf("Database error: (%d) %s", $mysqli->errno, $mysqli->error);
            exit;
        }

        $row = $result->fetch_assoc();

        $memc->set($row['title'], $row);

        printf("<p>Loaded (%s) from MySQL</p>", htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8');
    }
}
*/
?>
  </body>


