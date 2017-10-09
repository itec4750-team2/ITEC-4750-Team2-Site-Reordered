<?php
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');
?>

<h2 class="center">Your Created Surveys</h2>
<div class="container-fluid" style="padding: 20px 0px 15px 0px;">
	<div class="row">
		<div class="col-md-7 col-centered">
			<table class="table table-striped">
				<thead>
					<tr>
						<!-- Row 1 -->
						<th>Survey Title</th>
						<th>Class</th>
						<th>Semester</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<!-- Row 2 -->
						<td><a href="#">Group Member Evaluation</a></td>
						<td>ONLINE Senior Capstone</td>
						<td>Spring 2017</td>
					</tr>
					<!-- Row 3-->
					<tr>
						<td><a href="#">Group Member Evaulation</a></td>
						<td>ONLINE Senior Capstone</td>
						<td>Summer 2017</td>
					</tr>
					<!-- Row 4-->
					<tr>
						<td><a href="#">Group Member Evaulation</a></td>
						<td>ONLINE Senior Capstone</td>
						<td>Fall 2017</td>
					</tr>
					<!-- Row 5-->
					<tr>
						<td><a href="#">Placeholder</a></td>
						<td>Placeholder</td>
						<td>Placeholder</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_footers/facfooter.php');?>

</body>
</html>