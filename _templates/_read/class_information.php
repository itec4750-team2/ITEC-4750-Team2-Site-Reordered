<?php
// ++++ Change: Added Reusable Module to list class information. 9/30 KM ++++
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/class_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/class_model.php');
// CA_DO is called from originating page.
?>
<?php
// ++++ Change: Added Check for IDs module 10/10 KM ++++
// Gets IDs
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');
if($LoginID != 0){ //logged in
	if(!isset($ClassID) || empty($ClassID)){echo '<div class="error">No ClassID Found.</div>';}
	if(!empty($ClassID)){ // class id?>	
	<div class="row">
			<div class="col-md-5 col-centered">
	<?php
		// --------------- Class Information -------------
		// ++++ Change: Passed currently selected ClassID & $_SESSION['LoginID'] ++++
		$classdo = new Class_DO();
		$classpage=$classdo->classPage($ClassID, $_SESSION['LoginID']);
		foreach ($classpage as $value){
			$ClassNO = $value['ClassNO'];
			$ClassName=$value['ClassName'];
			$SemesterName=$value['SemesterName'];
			$Year = $value['Year'];
			$ExpDate = $value['ExpDate'];
			$SemesterID = $value['SemesterID'];
		}//End foreach
		?>
		<!-- ++++ change: added the word Semester to heading ++++ 9/5 KM-->

		<table class="table table-responsive">
		<caption id="table-caption"><?php echo $ClassName . ' - '. $SemesterName . ' Semester' ?></caption>
			<!-- Gives Class Information Recap -->
			<tr><th>Class Item Number</th><td><?php echo '<a href="class_page.php?cid='.$value['ClassID'].'">'.$value['ClassID'].'</a>';?></td></tr>
			<tr><th>Class Number</th><td><?php echo $ClassNO;?></td></tr>
			<tr><th>Class Name</th><td><?php echo $ClassName;?></td></tr>
			<tr><th>Class Expires</th><td><?php echo $ExpDate;?></td></tr>
			<tr><th>Semester</th><td><?php echo $SemesterName.' '.$Year;?></td></tr>
			<!-- ++++ change: Added faculty name to table +++ 9/5 KM-->
			<tr>
				<th>Current Instructor(s): </th>
				<?php
				// ----------------- Get Current Insts --------------
					$instr = new CA_DO();
					$facs=$instr->listClassInstrs($value['ClassID']);
					if($facs){
						$i=0;
						foreach ($facs as $val){
							$FID = $val['LoginID'];
							$FName = $val['FName'];
							$LName = $val['LName'];
							if($i==0){ // First instructor
								echo '<td>'. $FName .' '. $LName.'</td>';
							}
							else{ //In case of multiple instructors.
								echo '<tr>';
								echo '<th></th>';
								echo '<td>'. $FName .' '. $LName.'</td>';
								echo '</tr>';
								}
							$i++;
						}
					}
					else{
						echo '<td> No Instructor Listed. </td>';
					}
				?>
		</tr>
		</table>
 <?php }}// End IF Login && ClassID
 ?>