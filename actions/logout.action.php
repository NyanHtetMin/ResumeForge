<?php
require '../asstes/classes/function.class.php';
unset($_SESSION['Auth']); 
$fn->setAlert("Logout Successfully");
$fn->redirect("../index.php");
?>
