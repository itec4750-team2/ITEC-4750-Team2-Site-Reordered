// ValidateForm js for feedback forms
function validateForm() {
// validate email

// this regex is from https://stackoverflow.com/questions/7635533/validate-email-address-textbox-using-javascript
var reEmail = /^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!\.)){0,61}[a-zA-Z0-9]?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!$)){0,61}[a-zA-Z0-9]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/;
var feedbackEmail = document.forms["feedbackForm"]["myEmail"].value;
if ( !feedbackEmail.match(reEmail)) {
	alert("Please enter an e-mail address.");
	return false;
} // end if
if (document.forms["feedbackForm"]["noRadio"].checked == true && document.forms["feedbackForm"]["myComments"].value == "") {
	alert("Please explain what information you were not able to access in the comment field!");
	return false;
}
if (document.forms["feedbackForm"]["otherCheckbox"].checked == true && document.forms["feedbackForm"]["myComments"].value == "") {
	alert("Please explain what you did or did not like in the comment field!");
	return false;
}

return true;
} // end function validateForm