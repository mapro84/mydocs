<!DOCTYPE html>
<html>
<head>

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="public/css/main.css" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script type="text/javascript" src="public/js/javascript-utils.js"></script>
<script type="text/javascript" src="public/js/main.js"></script>
<title>My Documents</title>
</head>

<body class="bg-light">
  <nav class="navbar navbar-header navbar-expand-lg navbar-light bg-light">
    <div class="head-menu navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li>
        <a class="navbar-brand" href="index.php?page=home" ><img src="public/img/home.png" title="Home page - my notes"></a>
        </li>
        <li>
        <a class="navbar-brand" href="index.php?page=skills"><img src="public/img/folder.png" title="Documents"></a>
        </li>
        <?php if(getenv('admin') === 'true') { ?>
        <li class="back-office-logo">
        <a class="navbar-brand" href="index.php?page=bo&action=add"><img src="public/img/back-office.png" title="Back-office"></a>
        </li>   
        <?php } ?> 
      </ul>
    </div>
    <form method="post" id="frmSearch" name="frmSearch" role="form" class="was-validated" action="index.php?page=search">
      <div class="row mb-2">
          <div class="col-lg-4 d-flex">
              <input type="text" id="tbTerm" name="search" minlength="3" class="form-control rounded text-black" />
          </div>
          <div class="col-lg-1 mx-left">
              <button type="submit" id="btnSearch" class="btn-success btn text-white">
                Search
              </button>
          </div>
      </div>
      <input type="checkbox" class="form-check-input" name="openaiResearch">
      <label class="form-check-label" for="flexCheckDefault">
        OpenAI
      </label>
      <input type="checkbox" class="form-check-input" name="googleResearch">
      <label class="form-check-label" for="flexCheckDefault">
        Google
      </label>
    </form>
    <form class="form-inline  my-2 my-lg-0 col-1">
      <button class="btn my-2 my-sm-0" onclick="disconnect()"type="submit"><i class="fa fa-unlink"></i></button>
    </form>
  </nav>
  <div id="content" class="container-fluid">
    <main role="main" class="container">
    <div id="spinner" class="text-center">
        <div class="spinner-border text-primary">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <?php
      echo $content;
    ?>
    </main>
  </div>

<script>
document.querySelector("#btnSearch").addEventListener("click", () => {
  var str = document.getElementById('tbTerm').value;
  if (str.length < 3) {
    return false;
  }
  document.querySelector("#spinner").classList.remove('invisible');
});
document.getElementById("content").addEventListener("load", endSearch());
function endSearch() {
  document.querySelector("#spinner").classList.add('invisible');
}
</script>

</body>
</html>