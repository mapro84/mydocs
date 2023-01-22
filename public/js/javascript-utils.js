// Check if a string is empty
// Example of use str(document.getElementById('searchinput').value)
function checkIfEmpty(str) {
  if (str.trim() === '') {
    return true
  } else {
    return false
  }
}

function getCurrentUrl() {
return window.location.href;
}

function hideElementById(element_id){
	//document.getElementById(element_id).style.display = "none";
    document.getElementById(element_id).hidden=true;
}

function hideElementByName(element_name){
	//document.getElementByName(element_name).style.display = "none";
    document.getElementByName(element_name).hidden=true;
}
