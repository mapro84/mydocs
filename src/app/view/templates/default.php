<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="public/css/main.css" crossorigin="anonymous">
<script type="text/javascript" src="public/js/javascript-utils.js"></script>
<script type="text/javascript" src="public/js/main.js"></script>
<title>Tips&Notes</title>
</head>

<body>
<header class="navbar navbar-static-top bs-docs-nav" id="top">
<div class="container">
<div class="navbar-header">
<a href="index.php?page=home" class="navbar-brand"><img height="50px" src="public/img/tips-logo4.png"></a>
</div>
<ul class="nav navbar-nav">
<li>
<a href="index.php?page=skills"><img src="public/img/skills.png" title="Skills"></a>
</li>
<li>
<a href="index.php?page=skill_name&name=PHP"><img src="public/img/php.png" title="PHP"></a>
</li>
<li>
<a href="index.php?page=skill_name&name=Python"><img src="public/img/python.png" title="Python"></a>
</li>
<li>
<a href="index.php?page=skill_name&name=Linux"><img src="public/img/linux.png" title="Linux"></a>
</li>
<li>
<a href="index.php?page=skill_name&name=MySQL"><img src="public/img/mysql.png" title="Mysql"></a>
</li>
<li>
<a href="index.php?page=skill_name&name=HTML"><img src="public/img/html-logo.svg" title="Html"></a>
</li>
<li class="back-office-logo">
<a href="index.php?page=bo&action=add"><img src="public/img/back-office.png" title="Back-office"></a>
</li>
</ul>
<button class="btn float-right" onclick="disconnect()"><i class="fa fa logout icon"></i>Logout</button>
</div>
</header>

<div class="tipscontent">
<?php
echo $content;
?>
</div>

</body>
</html>