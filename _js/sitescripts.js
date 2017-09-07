$(document).ready(function(){
	$("#rating").hide();
	$(".click1").click(function(){
		$("#rating").show();
		$("#intro").hide();
	});
});

// ValidateForm js for feedback forms
function validateForm() {
if (document.forms[0].myEmail.value == "" ) {
	alert("Please enter an e-mail address.");
	return false;
} // end if
return true;
} // end function validateForm