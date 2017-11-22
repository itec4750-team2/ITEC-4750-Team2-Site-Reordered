<?php
	// ++++ Change: Adjusted indentation 9/7 KM ++++
/* --
--- -- --- WORK FLAG
---This page still needs work. I would like to have it prevent resubmitting the form. -- 9/7 KM
--- -- */
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/class_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/class_model.php');
?>
<!-- Main Content Section-->
<main>
	<div class="container-fluid" style="padding: 20px 0px 15px 0px;">
		<div class="row">
			<div class="col-md-5 col-centered">
				<?php
				// ++++ Change: Added Check for IDs module 10/8KM ++++

				// Gets IDs
				include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');

				//----------------- Get Class Info --------------->
				if($LoginID != 0){
					if(!isset($ClassID) || empty($ClassID)){ echo "<div>Uh-Oh No Class ID Found.</div>";}
					if(!empty($ClassID )){
						//calls class data object and loads table data by ClassID
						$classdo = new Class_DO();
						$classpage=$classdo->classPage($ClassID, $_SESSION['LoginID']);
						foreach ($classpage as $value){
							$ClassNO = $value['ClassNO'];
							$ClassName=$value['ClassName'];
							$SemesterName=$value['SemesterName'];
							$Year = $value['Year'];
							$ExpDate = $value['ExpDate'];
							$SemesterID = $value['SemesterID'];
						}
					?>	<!---------------- Show Class Info -------------->
					<table class="table table-responsive">
						<h1> Deleting this Class ?</h1>
						<tr><th>Class ID: </th><td><?php echo $ClassID ;?></td></tr>
						<tr><th>Class Number</th><td><?php echo $ClassNO;?></td></tr>
						<tr><th>Class Name: </th><td> <?php echo $ClassName;?></td></tr>
						<tr><th>Class Expires On:</th><td><?php echo $ExpDate ?></td></tr>
						<tr><th>Semester: </th><td><?php echo $SemesterName .' ' . $Year;?></td></tr>
						<tr></tr>
					</table>

					<form name="DeleteClass" method="POST" class="form-horizontal">
						<!-- Submit form  -->
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-9">
								<input type="submit" value="Delete Class" name="DeleteClass" id="DeleteClass" class="btn btn-primary btn-lg submit">
							</div>
						</div>

						<?php
							// -----------------Delete Class --------------------
							if(isset($_POST['DeleteClass'])){
								$delClass = new Classes(array(
									'LoginID' => $_SESSION['LoginID'],
									'ClassID' => $ClassID,
									'ClassNO' => $ClassNO,
									'ClassName' => $ClassName,
									'SemesterID' => $SemesterID,
									'ExpDate' => $ExpDate));
								$delClass->deleteClass();
								if($delClass){
									// ++++ Change: Added Check for sending page module 10/8KM ++++
									// Gets sending page and redirects
									include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getPage-Fac.php');
								}
							}
					}//End If !empty ClassID
				}//End If !empty LoginID

				?>
				</form>
			</div>
		</div>
	</div>
</main>
<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_footers/facfooter.php');?>
</body>
</html>