<?php 
use src\app\user\AppUser;
use src\Core\Utils\Debug;
use src\Core\Config\Config;

$action = $entities['action'];
$entity = isset($entities['entity']) ? $entities['entity'] : '';

if($action === 'add' || ($action === 'update' && $entity === 'skill')){
?>
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
if($action === 'add' || ($action === 'update' && $entity === 'item')){
?>
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
if($action === 'add' || ($action === 'update' && $entity === 'url')){
?>
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
if($action === 'add' || ($action === 'update' && $entity === 'demo')){
?>
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