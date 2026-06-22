<?php
require '../asstes/classes/database.class.php';
require '../asstes/classes/function.class.php';

if ($_POST) {
    $post = $_POST;


    if ($post['resume_id'] && $post['background']) {
       $post['tile']=$post['background'];
     $tile=$db->real_escape_string($post['tile']);
   

       
            $query = "UPDATE resumes SET background='$tile' WHERE id=" . (int) $post['resume_id'];

       
            $db->query($query);
            

    } 
}