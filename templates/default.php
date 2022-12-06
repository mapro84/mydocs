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
                <a href=".">Linux</a>
                </li>
                <li>
                <a href=".">PHP</a>
                </li>
                <li>
                <a href=".">Python</a>
                </li>
                <li class="active">
                <a href=".">Linux</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    v3.4.1 <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="https://getbootstrap.com/">Latest (4.x)</a></li>
                    <li><a href="https://v4-alpha.getbootstrap.com/">v4 Alpha 6</a></li>
                    <li class="divider"></li>
                    <li class="active"><a href="https://getbootstrap.com/docs/3.4/">v3.4.1</a></li>
                    <li><a href="https://getbootstrap.com/docs/3.3/">v3.3.7</a></li>
                    <li><a href="https://getbootstrap.com/2.3.2/">v2.3.2</a></li>
                </ul>
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

        <h1 class="title">My Skills</h1>

        <?php
            echo $content;
        ?>

        <script>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/twig.js/1.15.0/twig.js">
        </script>
    </body>
</html>