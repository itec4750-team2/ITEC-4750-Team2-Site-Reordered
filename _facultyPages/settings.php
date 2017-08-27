<?php 
include('../_templates/facultyHeader.php');
include('../_templates/facultyNav.php');
?>
<!--
--- -- --- WORK FLAG
--- This page still needs work. Currently stub for Changing Password
--- What settings should go here?
--- KM -- 8/27 AM
---
-->
	<div class="wrapper">
	
		<div id="settings">
			<h2 class="center">Settings</h2>
			<div class=one>
			<p>You may change your settings on this page.</p><br>
			</div class=one>
			<fieldset>
			<br>
			<form Name=Password>
			 Current password: <input Name=OldPassword type=password> 
			 <br>
			 <br>
			 New password: <input Name=NewPassword type=password>
			 <br>
			 <br>
			 <div class="one"><input type=button onclick="ChangePassword()" Value="Change Password" id="changepassword">
			</form>
			</div>
		</div>
	</div>
			</fieldset>
	<footer>
			
	</footer>
	
</body>
</html>


