<?php
require '../asstes/classes/database.class.php';
require '../asstes/classes/function.class.php';

if ($_POST) {
    $post = $_POST;

    if ($post['password']) {
       $password=md5($db->real_escape_string($post['password']));
       $email=$fn->getSession('email');

       $db->query("UPDATE users SET password='$password' WHERE email_id='$email'");
       $fn->setAlert('Password Changed Successfully');
        $fn->redirect("../index.php");

    } else {
        $fn->setError('Please enter new password');
        $fn->redirect("../change-password.php");
    }
} else {
    $fn->redirect("../change-password.php");
}