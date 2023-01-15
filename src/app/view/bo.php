<?php 
use src\app\user\AppUser;
use src\Core\Utils\Debug;
use src\Core\Config\Config;

if(getenv('admin') !== 'true'){
  echo 'NOT AUTHORIZED';
} else {
  ?>

<div class="container px-4 py-5" id="featured-2">
<div class="row g-4 py-5 row-cols-1 row-cols-lg-2">

<div class="col">
  <button type="button" class="collapsible btn btn-primary" id="boAddSkillButton">Add skill</button>
  <div class="content">
    <form class="postform" action="index.php?page=addskill" method="post">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" value="name" id="name" aria-describedby="name" placeholder="Enter name">
    </div>
    <div class="form-group">
      <label for="logo">Logo</label>
      <input type="text" class="form-control" value="logo" name="logo" id="logo" placeholder="logo">
    </div>
    <div class="form-check">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

<div class="col">
  <button type="button" class="collapsible btn btn-primary" id="boAddItemButton">Add Item to Skill</button>
  <div class="content">
    <form class="postform" action="index.php?page=additem" method="post">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" value="name" id="name" aria-describedby="name" placeholder="Enter name">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <input type="text" class="form-control" name="description" value="desc" id="description" placeholder="description">
    </div>
    <div class="form-group">
      <label for="further">Further</label>
      <input type="text" class="form-control" name="further" id="further" placeholder="further">
    </div>
    <div class="form-group">
      <label for="skill_id">Skill_id</label>
      <input type="text" class="form-control" name="skill_id" value="1" id="skill_id" placeholder="skill_id" pattern="[0-9]{1,3}">
    </div>
    <div class="form-check">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

<div class="col">
  <button type="button" class="collapsible btn btn-primary" id="boAddUrlToItemButton">Add Url to Item/Skill</button>
  <div class="content">
    <form class="postform" action="index.php?page=addurltoitem" method="post">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" value="name" name="name" id="name" aria-describedby="name" placeholder="Enter name">
    </div>
    <div class="form-group">
      <label for="url">Url</label>
      <input type="text" class="form-control" value="url" name="url" id="url" placeholder="url">
    </div>
    <div class="form-group">
      <label for="item_id">Item_id</label>
      <input type="text" class="form-control" name="item_id" id="item_id" placeholder="item_id" pattern="[0-9]{1,3}">
    </div>
    <div class="form-group">
      <label for="skill_id">skill_id</label>
      <input type="text" class="form-control" name="skill_id" value="1" id="skill_id" placeholder="skill_id" pattern="[0-9]{1,3}">
    </div>
    <div class="form-check">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

<div class="col">
  <button type="button" class="collapsible btn btn-primary" id="boAddNoteButton">Add Note</button>
  <div class="content">
    <form class="postform" action="index.php?page=addnote" method="post" class="was-validated">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control rounded text-black" id='notename' value="name" name="name" minlength="3" aria-describedby="name" placeholder="Enter name">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <input type="text" class="form-control rounded text-black" name="description" value="desc" id='notedesc'  minlength="3"  placeholder="description">
    </div>
    <div class="form-check">
    </div>
    <button type="submit" id="btnAddNote" class="btn-primary btn text-white">Submit</button>
  </div>
</div>

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

boAddSkillButton = document.getElementById('boAddSkillButton');
boAddSkillButton.addEventListener('click', e => {});
boAddSkillButton.dispatchEvent(new Event('click'));
boAddSkillButton.dispatchEvent(new Event('click'));

boAddItemButton = document.getElementById('boAddItemButton');
boAddItemButton.addEventListener('click', e => {});
boAddItemButton.dispatchEvent(new Event('click'));
boAddItemButton.dispatchEvent(new Event('click'));

boAddUrlToItemButton = document.getElementById('boAddUrlToItemButton');
boAddUrlToItemButton.addEventListener('click', e => {});
boAddUrlToItemButton.dispatchEvent(new Event('click'));
boAddUrlToItemButton.dispatchEvent(new Event('click'));

boAddNoteButton = document.getElementById('boAddNoteButton');
boAddNoteButton.addEventListener('click', e => {});
boAddNoteButton.dispatchEvent(new Event('click'));
boAddNoteButton.dispatchEvent(new Event('click'));

// TODO To Improve, does not work
boAddNoteButton = document.getElementById('btnAddNote');
boAddNoteButton.addEventListener('click', e => {
  var str = document.getElementById('notename').value;
  if (str.length < 3) {
    return false;
  }
});

</script>

</div>
</div>

<?php
}