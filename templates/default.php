<!DOCTYPE html>
<html>

    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/main.css" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <title>Learning</title>
    </head>

    <body>

        <header class="navbar navbar-static-top bs-docs-nav" id="top">
        <div class="container">
            <div class="navbar-header">
            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#bs-navbar" aria-controls="bs-navbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php?page=home" class="navbar-brand">Home</a>
            </div>
            <nav id="bs-navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                <a href="index.php?page=skills">Skills</a>
                </li>
                <li>
                <a href="index.php?skilltitle=PHP">PHP</a>
                </li>
                <li>
                <a href="index.php?skilltitle=Python">Python</a>
                </li>
                <li class="active">
                <a href="index.php?skilltitle=Linux">Linux</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                <nav> 
	                <ul>
					  <li><a href="index.php?page=factorydemo">Factory Demo</a> </li>
					  <li><a href="index.php?page=didemo" alt"dependency injection">DI Demo</a></li> 
					</ul>
				</nav>
                    <select name="cars" id="cars">
					  <option value="volvo"><a href="index.php?skilltitle=Python">Python</a></option>
					  <option value="saab">Saab</option>
					  <option value="mercedes">Mercedes</option>
					  <option value="audi">Audi</option>
					</select>
                </li>
                <li><a href="." onclick="ga('send', 'event', 'Navbar', 'Community links', 'Themes')">Themes</a></li>
                <li><a href="." onclick="ga('send', 'event', 'Navbar', 'Community links', 'Expo');">Expo</a></li>
                <li><a href="." onclick="ga('send', 'event', 'Navbar', 'Community links', 'Blog');">Blog</a></li>
            </ul>
            </nav>
        </div>
        </header>


        <ul id="navigation">
        </ul>

        <h1 class="title">IT Cheat-Sheets</h1>

        <?php
            echo $content;
        ?>

        <script>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/twig.js/1.15.0/twig.js">
        </script>
    </body>
</html>