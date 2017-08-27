<?php
   //Start your session
   session_start();
   //Read your session (if it is set)
   if (isset($_SESSION['FName']))
      echo $_SESSION['FName'];
?>
