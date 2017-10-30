<?php 
//Check logged in?
// ++++ Change: Added Check for IDs module 10/10 KM ++++
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');

//If logged in
if($LoginID != 0){ // Must be logged in. Role is checked in DO
?>