<?php 
use src\app\user\AppUser;
use src\Core\Utils\Debug;
use src\Core\Config\Config;

$action = $entities['action'];
$entity = isset($entities['entity']) ? $entities['entity'] : '';


if($action === 'add'){
?>
<div id="addsection">
<button type="button" class="collapsible">Add skill</button>
<div class="content">
  <form class="postform" action="index.php?page=addskill" method="post">
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" name="name" pattern="[À-žA-Za-z0-9.\s]{5,50}" title="Only alphanumeric values, at least 3 characters">
  </div>
  <div class="form-group">
    <label for="logo">Logo:</label>
    <input type="text" name="logo" pattern="[\sA-Za-z0-9.-]{5,15}" title="Only alphanumeric values, at least 5 characters, 15 max">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form> 
</div>
<br><!--  ============================================================================ -->
<button type="button" class="collapsible">Add Item to Skill</button>
<div class="content">
<form class="postform" action="index.php?page=additem" method="post">
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" name="name" pattern="[À-žA-Za-z0-9.,!\s]{3,50}" title="Only alphanumeric values, at least 3 characters">
  </div>
  <div class="form-group">
    <label for="description">Description:</label>
    <input type="text" name="description" pattern="[À-žA-Za-z0-9.,!\s]{3,2000}" title="Only alphanumeric values, at least 5 characters">
  </div>
  <div class="form-group">
    <label for="further">Further:</label>
    <input type="text" name="further" pattern="[A-Za-z0-9.:/?&]{0,50}">
  </div>
    <div class="form-group">
    <label for="skill_id">Skill_id:</label>
    <input type="text" name="skill_id" pattern="[0-9]{1,3}">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form> 
</div>
<br><!--  ============================================================================ -->
<button type="button" class="collapsible">Add Url to Item</button>
<div class="content">
<form class="postform" action="index.php?page=addurltoitem" method="post">
  <div class="form-group">
    <strong>Add an Url</strong>
  </div>
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" name="name" pattern="[À-žA-Za-z0-9.,!\s]{3,50}" title="Only alphanumeric values, at least 3 characters">
  </div>
  <div class="form-group">
    <label for="url">Url:</label>
    <input type="text" name="url" pattern="[A-Za-z0-9.:/?&]{0,50}">
  </div>
    <div class="form-group">
    <label for="item_id">Item_id:</label>
    <input type="text" name="item_id" pattern="[0-9]{0,3}">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>
<br><!--  ============================================================================ -->
<button type="button" class="collapsible">Add Demo to Item</button>
<div class="content">
<form class="postform" action="index.php?page=adddemotoitem" method="post">
   <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" name="name" pattern="[À-žA-Za-z0-9.,!\s]{3,50}" title="Only alphanumeric values, at least 3 characters">
  </div>
  <div class="form-group">
    <label for="description">Description:</label>
    <input type="text" name="description" pattern="[A-Za-z0-9.?&\s!]{0,50}">
  </div>
    <div class="form-group">
    <label for="item_id">Item_id:</label>
    <input type="text" name="item_id" pattern="[0-9]{0,3}">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form> 
</div>
<br><!--  ============================================================================ -->
<button type="button" class="collapsible">Add Note</button>
<div class="content">
<form class="postform" action="index.php?page=addnote" method="post">
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" name="name" pattern="[À-žA-Za-z0-9.,!\s]{5,500}" title="Only alphanumeric values, at least 3 characters">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <input type="text" name="description" pattern="[À-žA-Za-z0-9.,!\s]{5,500}" title="Only alphanumeric values, at least 5 characters">
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
	$item = $entities['item'];
?>
<br> <!-- ============================================================================ -->
<button type="button" class="collapsible">Edit Item</button>
<div class="content">
<form class="postform" action="index.php?page=updateitem" method="post">
  <input type=hidden name="id" value="<?php echo $item->id; ?>">
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" name="name" value="<?php echo $item->name; ?>" pattern="[À-žA-Za-z0-9.,!\s]{3,50}" title="Only alphanumeric values, at least 3 characters">
  </div>
  <div class="form-group">
    <label for="description">Description:</label>
    <input type="text" name="description" value="<?php echo $item->description; ?>" pattern="[À-žA-Za-z0-9.,!\s]{3,2000}" title="Only alphanumeric values, at least 5 characters">
  </div>
  <div class="form-group">
    <label for="further">Further:</label>
    <input type="text" name="further" value="<?php echo $item->further; ?>" pattern="[A-Za-z0-9.:/?&]{0,50}">
  </div>
    <div class="form-group">
    <label for="skill_id">Skill_id:</label>
    <input type="text" name="skill_id" value="<?php echo $item->skill_id; ?>" pattern="[0-9]{1,3}">
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