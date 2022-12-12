<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="public/js/javascript-utils.js"></script>
<script type="text/javascript" src="public/js/main.js"></script>
<link rel="stylesheet" href="public/css/main.css" crossorigin="anonymous">
<title>IT Cheat-Sheets</title>
</head>

<?php 

//$_SERVER["HTTP_COOKIE"] = "PHPSESSID=4996l68f35rlnvcb9iqbmgvarkMarioetluigi";
var_dump($_SERVER["HTTP_COOKIE"]);
?>

<body>
<header class="navbar navbar-static-top bs-docs-nav" id="top">

<div class="container">
<div class="navbar-header">
<a href="index.php?page=home" class="navbar-brand">Home</a>
</div>
<ul class="nav navbar-nav">
<li>
<a href="index.php?page=skills">Skills</a>
</li>
<li>
<a href="index.php?page=skill_name&name=PHP">PHP</a>
</li>
<li>
<a href="index.php?page=skill_name&name=Python">Python</a>
</li>
<li>
<a href="index.php?page=skill_name&name=Linux">Linux</a>
</li>
<li>
<a href="index.php?page=bo&action=add">BO</a>
</li>
<li>
<button class="btn" onclick="disconnect()"><i class="fa fa logout icon"></i>Logout</button>
</li>
<li>

<?php
if (isset($_COOKIE["user"])) echo 'Welcome ' . htmlspecialchars($_COOKIE["user"]) . '!';
?>

</li>
</ul>
</div>
</header>

<h1 class="title">IT Cheat-Sheets</h1>

<?php
echo $content;
?>

</body>
</html>