<?php
	if(isset($_SESSION['ErrorBlock'])){
					echo $_SESSION['ErrorBlock'];
					$_SESSION['ErrorBlock'] = "";
				}	
				
				//if(isset($_SESSION)){echo '<pre>'; print_r($_SESSION); echo '</pre>';};  //error checking session	
?>