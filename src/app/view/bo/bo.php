<?php 
use src\app\user\AppUser;
use src\Core\Utils\Debug;
use src\Core\Config\Config;

$cookie_lifetime = Config::getGenConfKey('cookie_lifetime');
session_start(['cookie_lifetime' => $cookie_lifetime]);

if(!isset($_SESSION['auth'])){
	header('Location: index.php?page=login');
}else{
?>

<form class="postform" action="index.php?page=bo&action=boaddskill" method="post">
  <div class="form-group">
    <strong>Add a Skill</strong>
  </div>
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text">
  </div>
  <div class="form-group">
    <label for="description">Description:</label>
    <input type="text">
  </div>
  <div class="form-group">
    <label for="logo">Logo:</label>
    <input type="text">
  </div>
  <div class="form-group">
    <label for="further">Further:</label>
    <input type="text">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form> 

<form class="postform" action="index.php?page=bo&action=boadditem" method="post">
  <div class="form-group">
    <strong>Add a Item</strong>
  </div>
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text">
  </div>
  <div class="form-group">
    <label for="description">Description:</label>
    <input type="text">
  </div>
  <div class="form-group">
    <label for="further">Further:</label>
    <input type="text">
  </div>
    <div class="form-group">
    <label for="skill_id">Skill_id:</label>
    <input type="text">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form> 

<form class="postform" action="index.php?page=bo&action=boaddurl" method="post">
  <div class="form-group">
    <strong>Add an Url</strong>
  </div>
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text">
  </div>
  <div class="form-group">
    <label for="url">Url:</label>
    <input type="text">
  </div>
  <div class="form-group">
    <label for="entity">Entity:</label>
    <input type="text">
  </div>
  <div class="form-group">
    <label for="skill_id">Skill_id:</label>
    <input type="text">
  </div>
    <div class="form-group">
    <label for="item_id">Item_id:</label>
    <input type="text">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>

<form class="postform" action="index.php?page=bo&action=boadddemo" method="post">
  <div class="form-group">
    <strong>Add an Demo</strong>
  </div>
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text">
  </div>
  <div class="form-group">
    <label for="skill_id">Skill_id:</label>
    <input type="text">
  </div>
    <div class="form-group">
    <label for="item_id">Item_id:</label>
    <input type="text">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form> 
<?php 
}
?>