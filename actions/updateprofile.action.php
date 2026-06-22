<?php
require '../asstes/classes/database.class.php';
require '../asstes/classes/function.class.php';

if ($_POST) {
    $post = $_POST;

    if ($post['full_name'] && $post['email_id']) {

        $full_name = $db->real_escape_string($post['full_name']);
        $email_id  = $db->real_escape_string($post['email_id']);
        $password  = isset($post['password']) && $post['password'] !== '' 
                     ? md5($db->real_escape_string($post['password'])) 
                     : '';
        $authid=$fn->Auth()['id'];
        $result = $db->query(
            "SELECT COUNT(*) as user FROM users WHERE (email_id='$email_id'&& id!=$authid)"
        );
        $result = $result->fetch_assoc();

        if ($result['user']) {
            $fn->setError($email_id . ' is already registered');
            $fn->redirect("../profile.php");
            die();
        }
       if($password != ''){
        $db->query("UPDATE users SET full_name='$full_name',email_id='$email_id',password='$password' WHERE id='$authid'");
       }else{
        $db->query("UPDATE users SET full_name='$full_name',email_id='$email_id' WHERE id='$authid'");
       }
       // Update the session so the navbar reflects any name change
       $fn->setAuth(['id' => $authid, 'full_name' => $full_name]);
       $fn->setAlert('Profile is updated !');
       $fn->redirect('../profile.php');

    } else {
        $fn->setError('Please fill the form');
        $fn->redirect("../profile.php");
    }
} else {
    $fn->redirect("../profile.php");
}