<?php
require '../asstes/classes/database.class.php';
require '../asstes/classes/function.class.php';

if ($_POST) {
    $post = $_POST;

    if ($post['otp']) {
       $otp=$post['otp'];

       if($fn->getSession('otp')==$otp){
        $fn->setAlert("OTP Verified Successfully");
        $fn->redirect("../change-password.php");
       }else{
        $fn->setError('Incorrect OTP');
        $fn->redirect("../verfication.php");    
       }

        
    } else {
        $fn->setError('Please enter 6 digit code sended to your email');
        $fn->redirect("../verfication.php");
    }
} else {
    $fn->redirect("../verfication.php");
}