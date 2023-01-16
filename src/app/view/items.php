<?php
use src\Core\Utils\Debug;
use src\Core\Utils\Check;

$admin = getenv('admin');

if (!empty($entities['items'])) {
	$items = $entities['items'];
	$demos = $entities['demos'] ?? [];
	$relatedUrls = $entities['relatedUrls'] ?? [];
	$openaiResponse = $entities['openaiResponse'] ?? [];
	$skillLogos = $entities['skillLogos'] ?? [];
	?>

<div class="container">
<div class="row py-4 row-cols-1 row-cols-lg-3">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="head-menu collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav mr-auto">
<?php
		foreach ($skillLogos as $skillid => $logo) {
			echo '<a href="index.php?page=skill&skill_id=' . 
			$skillid . '"><img class="logo" src="./public/img/' . $logo . '"></a>';
			if(count($skillLogos) === 1){
				$skill_name = preg_replace('/\..*$/', '', $logo);
				echo '<form class="form-inline" method="post" action="index.php?page=deleteskill" ' .
				'onsubmit="return confirm(\'Do you confirm to delete ' . $skill_name. ' skill?\');">' .
				'<input type="hidden" name="id" value='.$skillid.'>' . 
				'<button class="btn"><i class="fa fa-trash"></i></button></form>';
			}
		}
		?>
</ul>
</div>
</nav>
</div>
</div>

<div class="container">
<?php
		$idsArray = [];
		foreach ($items as $item) {
			if (in_array($item['id'], $idsArray)) {
				continue;
			}
			array_push($idsArray, $item['id']);
			if (!empty($item['name'])) {
				$match = "/^([a-zA-Z]+:\s)(.*$)/";
				$itemName = preg_replace($match, "$2", $item['name']);
				$deleteButton = '<form class="form-inline" method="post" action="index.php?page=deleteitem" ' .
				'onsubmit="return confirm(\'Do you confirm to delete ' . $itemName. ' item?\');">' .
				'<input type="hidden" name="item_id" value='.$item['id'].'>' . 
				'<button class="btn"><i class="fa fa-trash"></i></button></form>';
				$editButton = '
				<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editModal" 
				data-bs-id="'. $item['id'].'" data-bs-name="'. $itemName.'">'.
				'<i class="fa fa-edit"></i></button>';
				echo "<div class='row mb-2, border-bottom'>";
				echo '<div class="col-4">';
				echo $admin === 'true' ? $editButton : '';
				echo $admin === 'true' ? $deleteButton : '';
					if (!is_null($item['further']) && Check::isUrl($item['further'])) {
							echo '<a class="text-row" href="' . $item['further'] . '" target="_blank">' . $itemName . '</a>';
					} elseif (!is_null($item['further']) && Check::isPdf($item['further'])) {
						echo '<a class="text-row" href="./public/doc/' . $item['further'] . '" target="_blank">' . $itemName . '</a>';
					} else {
						echo '<span class="text-row">'.$itemName.'</span>';
					}
					echo '</div>';
					echo '<div class="col-7">' . $item['description'] . '</div>';
					echo '<div class="col-1 hidden">';
						echo '<input type="hidden" id="description'.$item['id'].'" value="'.$item['description'].'">';
						echo '<input type="hidden" id="further'.$item['id'].'" value="'.$item['further'].'">';
					echo '</div>';
				echo "</div>";
			}
		}

		?>
</div>

<!-- MODAL -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editModalLabel">Edit Item</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="index.php?page=updateitem">
				  <input type="hidden" name="id" id="id" value=''>
          <div class="mb-3">
            <label for="name" class="col-form-label">Name:</label>
            <input name="name" type="text" class="form-control" id="name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Description:</label>
            <textarea name="description" id="description" class="form-control"></textarea>
          </div>
					<div class="mb-3">
            <label for="message-text" class="col-form-label">Further:</label>
            <textarea name="further" id="further" class="form-control"></textarea>
          </div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Update Item</button>
					</div>
        </form>
      </div>

    </div>
  </div>
</div>

<script>
const editModal = document.getElementById('editModal')
editModal.addEventListener('show.bs.modal', event => {
  // Button that triggered the modal
  const button = event.relatedTarget
  // Extract info from data-bs-* attributes
	const id = button.getAttribute('data-bs-id')
  const name = button.getAttribute('data-bs-name')
	const title = name.substring(0,15)+'...'
	const descriptionId = 'description'+id;
	const description = document.getElementById(descriptionId).value
	const furtherId = 'further'+id;
	const further = document.getElementById(furtherId).value
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.

  // Update the modal's content.
  const modalTitle = editModal.querySelector('.modal-title')
	const modalBodyInputId = editModal.querySelector('.modal-body #id')
	const modalBodyInputName = editModal.querySelector('.modal-body #name')
	const modalBodyInputDescription = editModal.querySelector('.modal-body #description')
	const modalBodyInputFurther = editModal.querySelector('.modal-body #further')

  modalTitle.textContent = `Edit item ${title}`
	modalBodyInputId.value = id
  modalBodyInputName.value = name
	modalBodyInputDescription.value = description
	modalBodyInputFurther.value = further
})
</script>

<?php
		if (!empty($openaiResponse)) {
			?>
	<div id="openai" class="container px-4 py-5">
		<?php
		echo '<strong>OPENAI Definition:</strong><br>';
		echo '<p>'.$openaiResponse.'</p>';
		?>
	</div>
<?php
		}
		?>

<div class="container mt-4">
<?php
		$numberUrls = count($relatedUrls);
		if ($numberUrls > 0) {
			?>
<ul>
	<li class="remove-bullet">Related urls</li>
	<ul>
	<?php
			$idsArray = [];
			foreach ($relatedUrls as $url) {
				if (in_array($url['id'], $idsArray)) {
					continue;
				}
				array_push($idsArray, $url['id']);
				echo '<li><form class="form-inline" method="post" action="index.php?page=deleteurl" ' .
				'onsubmit="return confirm(\'Do you confirm to delete ' . $url['urlname']. ' url?\');">' .
				'<input type="hidden" name="id" value='.$url['id'].'>' . 
				'<button class="btn"><i class="fa fa-trash"></i></button></form>';
				echo '<a href="' . $url['url'] . '" target="_blank">' . $url['urlname'] . '</a></li>';
			}
			?>
</ul>
</ul>
<?php
		}
		?>
</div>

<div class="container">
<?php
		$numberDemos = count($demos);
		if ($numberDemos > 0) {
			?>
<ul>
	<li class="remove-bullet">Related Demos</li>
	<ul>
	<?php
			foreach ($demos as $demo) {
				if (in_array($demo['did'], $idsArray)) {
					continue;
				}
				array_push($idsArray, $demo['did']);
				echo '<li><a href="index.php?page=demo&demo_id=' . $demo['did'] . '" target="_blank">' . $demo['dname'] . '</a></li>';
			}
			?>
	</ul>
</ul>
<?php
		}
		?>
</div>
<?php
}else{
	echo '<div class="container px-4 py-5" id="featured-3">';
	echo '<h1>No datas</h1>';
	echo '</div>';
}
?>
