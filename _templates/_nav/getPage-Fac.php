<?php
// ++++ Change: Added getPage Module. Defaults to facultyDashboard. 10/8 KM ++++
// For pages passed through header
if(!empty($_GET['p'])){
	$returnME = $_GET['p']; // get sending Page
}
	
if(isset($returnME)){
	if($returnME != 'facultyDashboard'){
		if(isset($ClassID)){
			// ++++ Change: If statements to distinguish between faculty and student to reload sending page.php 9/29 KM ++++
			if(isset($_GET['stid'])){
				if(!empty($_GET['stid'])){
					echo "<script>window.open('../../../_facultyPages/" . $returnME . ".php?stid=". $StID. "&cid=" . $ClassID . "', '_self') </script>";
				}	
			}
			if(isset($_GET['fid'])){
				if(!empty($_GET['fid'])){echo "<script>window.open('../../../_facultyPages/" . $returnME . ".php?fid=". $FID . "&cid=" . $ClassID . "','_self') </script>";}
			}
			else{echo "<script>window.open('../../../_facultyPages/" . $returnME . ".php?&cid=" . $ClassID . "','_self') </script>";}
		}
		else {
			// ++++ Change: If statements to distinguish between faculty and student to reload sending page.php 9/29 KM ++++
			if(isset($_GET['stid'])){
				if(!empty($_GET['stid'])){
					echo "<script>window.open('../../../_facultyPages/" . $returnME . ".php?stid=". $StID. "', '_self') </script>";
				}	
			}
			if(isset($_GET['fid'])){
				if(!empty($_GET['fid'])){echo "<script>window.open('../../../_facultyPages/" . $returnME . ".php?fid=". $FID . "','_self') </script>";}
			}
			else{echo "<script>window.open('../../../_facultyPages/" . $returnME . ".php','_self') </script>";}
		}
	}
}

else{	
	$returnME = 'facultyDashboard';
	
	// Default to dashboard
	// Will redirect student to studentDashboard b/c of php in headers
	if($returnME == 'facultyDashboard'){
		echo '<div>No sending page info.</div>';
		echo "<script>window.open('../../../_facultyPages/".$returnME.".php', '_self')</script>"; 
	}
}
?>