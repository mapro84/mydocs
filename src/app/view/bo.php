<?php 
use src\app\user\AppUser;
use src\Core\Utils\Debug;
use src\Core\Config\Config;

$action = $entities['action'];
$entity = isset($entities['entity']) ? $entities['entity'] : '';

if($action === 'add'){
?>
<div id="addsection">
<button type="button" class="collapsible">Add a skill</button>
<div class="content">
  <form class="postform" action="index.php?page=addskill" method="post">
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" name="name" pattern="[À-žA-Za-z0-9.,!]{5,50}" title="Only alphanumeric values, at least 3 characters">
  </div>
  <div class="form-group">
    <label for="description">Description:</label>
    <input type="text" name="description" pattern="[À-žA-Za-z0-9.,!]{5,2000}" title="Only alphanumeric values, at least 5 characters">
  </div>
  <div class="form-group">
    <label for="logo">Logo:</label>
    <input type="text" name="logo" pattern="[A-Za-z0-9.-]{5,15}" title="Only alphanumeric values, at least 5 characters, 15 max">
  </div>
  <div class="form-group">
    <label for="further">Further:</label>
    <input type="text" name="further" pattern="[A-Za-z0-9.]">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form> 
</div>
<!-- <br> ============================================================================ -->
<button type="button" class="collapsible">Add an Item</button>
<div class="content">
<form class="postform" action="index.php?page=bo&action=boadditem" method="post">
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" name="name" pattern="[À-žA-Za-z0-9.,!]{5,50}" title="Only alphanumeric values, at least 3 characters">
  </div>
  <div class="form-group">
    <label for="description">Description:</label>
    <input type="text" name="description" pattern="[À-žA-Za-z0-9.,!]{5,2000}" title="Only alphanumeric values, at least 5 characters">
  </div>
  <div class="form-group">
    <label for="further">Further:</label>
    <input type="text" name="further" pattern="[A-Za-z0-9.]">
  </div>
    <div class="form-group">
    <label for="skill_id">Skill_id:</label>
    <input type="text" name="further" pattern="[A-Za-z0-9.]{1,2}">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form> 
</div>
<br> <!-- ============================================================================ -->
<button type="button" class="collapsible">Add an Url</button>
<div class="content">
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
</div>
<!-- <br> ============================================================================ -->
<button type="button" class="collapsible">Add a Demo</button>
<div class="content">
<form class="postform" action="index.php?page=bo&action=boadddemo" method="post">
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
</div>
</div>

<?php 
}else{

if($action === 'update' && $entity === 'skill'){
	?>
<br> <!-- ============================================================================ -->
<div id="addsection">
<button type="button" class="collapsible">Add a skill</button>
<div class="content">
  <form class="postform" action="index.php?page=bo&action=boaddskill" method="post">
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
</div>
<br> <!-- ============================================================================ -->
<?php
}
if($action === 'update' && $entity === 'item'){
?>
<br> <!-- ============================================================================ -->
<button type="button" class="collapsible">Add an Item</button>
<div class="content">
<form class="postform" action="index.php?page=bo&action=boadditem" method="post">
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
</div>
<br> <!-- ============================================================================ -->
<?php
}
if($action === 'update' && $entity === 'url'){
?>
<br> <!-- ============================================================================ -->
<button type="button" class="collapsible">Add an Url</button>
<div class="content">
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
</div>
<br> <!-- ============================================================================ -->
<?php
}
if($action === 'update' && $entity === 'demo'){
?>
<br> <!-- ============================================================================ -->
<button type="button" class="collapsible">Add a Demo</button>
<div class="content">
<form class="postform" action="index.php?page=bo&action=boadddemo" method="post">
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
</div>
</div>
<br> <!-- ============================================================================ -->
<?php
}
}
?>

<script>
var coll = document.getElementsByClassName("collapsible");
var i;
for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>