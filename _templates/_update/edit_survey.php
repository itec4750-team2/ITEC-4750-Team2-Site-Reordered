<?php 
// Change Added edit_survey template 11/18/17 KM
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/drop_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/profile_do.php');
//include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');

if($LoginID != 0){	
	if(!empty($GroupID)){?>
		<h2> Edit Survey </h2>
		<form name ="create-profile" method = "POST" >
			<table class="table-hover" id="table-hover">
			<?php
			/*	
			echo 'LoginID: '.$LoginID.'<br/>';
			echo 'TeamMemberID: '.$Subj.'<br/>';
			echo 'GSurveyID: '.$GSurveyID.'<br/>';
			echo 'GroupID: '.$GroupID.'<br/>';
			*/
			
			//For Matching Survey -- echo current selections into fields
			$surveydo2 = new Survey_DO();
			$rows=$surveydo2->editInfo($LoginID, $Subj, $GSurveyID, $GroupID);
			$j=1;
			foreach ($rows as $value){
				if($j==1){?>	
					<thead>	
						<tr>
							<caption id="table-caption"> <?php echo $value['GSurveyName']. ' for <b>'.$value['FName'].' '.$value['LName'].'</b>'; ?></caption>
							<!-- <hr id="table-caption"/>-->
						</tr>				
						<tr>
							<th class="col-sm-1">#</th>
							<th class="col-sm-7">Survey Question</th>
							<th class="col-sm-2">Response</th>
						</tr>
					</thead>
					<tbody>
			<?php } ?> 
					<tr>
						<td class="col-sm-1">
							<?php echo $value['QuestionNum']; ?>
						</td>
						
						<td class="col-sm-7"> 
						  <!-- Hidden Value -->
						  <input type="hidden" name="Q[]" value=<?php echo $value['ResponseID']?>>
						  <!-- Question Text -->
						  <Label for = "ResponseVal[]"><?php echo $value['QuestionTxt'];?> </label>
						</td>
						
						<td class="col-sm-2">
							<select  id="form-select" class="form-control inputColor" name="ResponseVal[]"  required >
							  <option value="<?php echo $value['ResponseValue']; ?>" selected><?php echo $value['Response'];?></option>
							  <option value="1">Excellent</option>
							  <option value="2">Good</option>
							  <option value="3">Okay</option>
							  <option value="4">Poor</option>
							  <option value="5">Awful</option>
							</select>
						</td>
					</tr>			
<?php
			$j++;
	} //For each row

?>
					</tbody>
			</table>
			<br/>
			<input class="btn btn-primary btn-lg submit" type="submit" value="Update Survey" name="UpdateSurvey" id="UpdateSurvey">
			<?php if($Role=="Student"){ ?>
			<a class="btn btn-primary btn-lg submit" href="../../../_studentPages/completed_surveys.php">Back to List</a> <?php } ?>
			<?php if($Role=="Faculty"){ ?>
			<a class="btn btn-primary btn-lg submit" href="../../../_facultyPages/yoursurveys.php">Back to List</a> <?php } ?>
		</form>
<?php 
		$uSurvey = new Survey_DO();
		if(isset($_POST['UpdateSurvey'])){
			if($_POST['ResponseVal']!=0){
				$RespVal=$_POST['ResponseVal'];
				$RespID=$_POST['Q'];
				$size=sizeof($RespVal);
				for($i=0;$i<$size;$i++){
					$ResponseID = $RespID[$i];
					$ResponseValue=$RespVal[$i];
					
					if($ResponseValue>0){
						$uSurvey->updateSurvey($LoginID, $ResponseValue, $ResponseID);	
					}		
				}
				}
				if($i=$size){
					$string = '?stid='.$value['TeamMemberID'].'&gid='.$value['GroupID'].'&gsid='.$value['GSurveyID'];
					if($Role=="Student"){ echo "<script>window.open('../../../_studentPages/edit_survey.php".$string."', '_self') </script>";}
					if($Role=="Faculty"){ echo "<script>window.open('../../../_facultyPages/yoursurveys.php".$string."', '_self') </script>";}
				}
			
		}//If Post
	} //If !empty GroupID
}//If !=0 LoginID

?>
</div>
