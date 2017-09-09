<?php
class Drop_DO{
	
	//++++ Change: added all faculty drop box for update_class_pg  9/8 KM ++++
	// All Faculty Dropbox
	function facSelect(){
		include("../_php/config.php");
		$sql = "SELECT LoginID, FName, LName From login WHERE Role= 'Faculty'
			ORDER BY LName";
		$facSel = mysqli_query($con, $sql);
		$all_rows = array();
		while($row = mysqli_fetch_array($facSel)){
			$all_rows[]=$row;
		}
		return $all_rows;
	}
	//++++ Change: added all students drop box 9/8 KM ++++
	//All Students Dropbox
	function studSelect(){
		include("../_php/config.php");
		$sql = "SELECT LoginID, FName, LName From login WHERE Role= 'Student'
			ORDER BY LName";
		$studSel = mysqli_query($con, $sql);
		$all_rows = array();
		while($row = mysqli_fetch_array($studSel)){
			$all_rows[]=$row;
		}
		return $all_rows;
	}
	// Semester Dropbox
	function semSelect(){
		include("../_php/config.php");
		$sql = "SELECT SemesterID, SemesterName, Year From semester
			ORDER BY Year, SemesterName";
			// ++++ Change: Added table order to query 9/8 KM ++++
		$semSelect = mysqli_query($con, $sql);
		$all_rows = array();
		while($row = mysqli_fetch_array($semSelect)){
			$all_rows[]=$row;
		}
		return $all_rows;
	}
	//++++ Change: added class group drop box for class_page  9/5 KM ++++
	//Class Groups Dropbox
	function classGroups($ClassID){
		if(!empty($ClassID)){	
			include("../_php/config.php");
			$sql = "SELECT cgroup.GroupID, cgroup.GroupName
				FROM(cgroup
				INNER JOIN class ON cgroup.ClassID=class.ClassID)
				WHERE class.ClassID = '$ClassID'
				ORDER BY cgroup.GroupID";
			// ++++ Change: Added table order to query 9/6 KM ++++
			$groupSel = mysqli_query($con, $sql);
			$all_rows = array();
			while($row = mysqli_fetch_array($groupSel)){
				$all_rows[]=$row;
			}
			return $all_rows;
		}
	}	
	//++++ Change: Added group drop box for group assign on student_mgt_pg 9/6 KM ++++
	//All Groups Dropbox
	function allGroups(){
		include("../_php/config.php");
		$sql = "SELECT cgroup.GroupID, cgroup.GroupName, class.ClassID
			FROM(cgroup
			INNER JOIN class ON cgroup.ClassID=class.ClassID)
			ORDER BY class.ClassID, cgroup.GroupID";
		$allgroups = mysqli_query($con, $sql);
		$all_rows = array();
		while($row = mysqli_fetch_array($allgroups)){
			$all_rows[]=$row;
		}
		return $all_rows;
	}
	//++++ Change: Added all classes drop box for group assign on student_mgt_pg 9/6 KM ++++
	//Classes Dropbox
	function allClasses(){
		include("../_php/config.php");
		$sql = 'SELECT class.ClassID, semester.SemesterName, semester.Year, class.ExpDate, class.ClassNO, class.ClassName  
			FROM(class
			INNER JOIN semester ON semester.SemesterID=class.SemesterID)
			WHERE DATEDIFF(class.ExpDate, NOW())>0
			ORDER BY class.ClassID, class.ClassNO';
		$allClassSel = mysqli_query($con, $sql);
		$all_rows = array();
		while($row = mysqli_fetch_array($allClassSel)){
			$all_rows[]=$row;
		}
		return $all_rows;	
	}
}
?>