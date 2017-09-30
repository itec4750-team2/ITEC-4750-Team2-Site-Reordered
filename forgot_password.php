<?php
//Change: ++++ Renamed/Updated to use forgotpassword template ++++
	include($_SERVER['DOCUMENT_ROOT'].'/_templates/mainHeader.php');
?>
	<main>
		<?php 
			include($_SERVER['DOCUMENT_ROOT'].'/_templates/forgotpassword.php'); 
		?>
	</main>
<div class = 'clear'></div>	
<?php 	
	include($_SERVER['DOCUMENT_ROOT'].'/_templates/mainNav.php');
	include($_SERVER['DOCUMENT_ROOT'].'/_templates/footer.php'); 
?>
</body>
</html>