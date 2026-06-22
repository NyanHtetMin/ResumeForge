<?php
require '../asstes/classes/database.class.php';
require '../asstes/classes/function.class.php';

if ($_POST) {
    $post = $_POST;


    if ($post['resume_id'] && $post['font']) {
       
     $font=$db->real_escape_string($post['font']);
   

       
            $query = "UPDATE resumes SET font='$font' WHERE id=" . (int) $post['resume_id'];

       
            $db->query($query);
            

    } 
}