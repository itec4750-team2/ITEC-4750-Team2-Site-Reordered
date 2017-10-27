<?php
// ++++ Change: Created add_students 10/15 KM ++++
// ++++ Change: Added as a stub page 9/24 KM ++++
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');

// Gets IDs
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');
$P='add_students';
$Role='Student'; // Set Uploaded profile Roles
?>
<div class="wrapper">
<main>
<div class = "content">
<p>
Upload an XML file here. The file should include 3 columns: First Name, Last Name & Email Address.<br/>
New students will be added. If an email is already in use the student will not be added.<br/>
<br/>
</p>
</div>
<form enctype="multipart/form-data" method="POST">
  <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
	  <table width="600" class="table table-hover">
		  <tr>
			  <td>Upload XML file:</td>
			  <td><input type="file" name="file" /></td>
			  <td><input type="submit" name ="Upload" value="Upload" id = "Upload"/></td>
		  </tr>
	  </table>
  </form>
	<?php
	if(isset($_POST['Upload'])){
		include($_SERVER['DOCUMENT_ROOT'].'/_templates/_create/profiles_from_file.php');
	}
	?>
  </body>
</main>
</div><!--End wrapper-->

<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_footers/facfooter.php');?>
</body>
</html>