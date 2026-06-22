<?php 
require '../asstes/classes/database.class.php';
require '../asstes/classes/function.class.php';

$slug=$_GET['resume']??'';
$resumes = $db->query("SELECT * FROM resumes WHERE (slug='$slug' AND user_id=".$fn->Auth()['id'].")");
$resume = $resumes->fetch_assoc();
if(!$resume){
    $fn->redirect('../myresumes.php'); 
}
$exps = $db->query("SELECT * FROM experiences WHERE (resume_id=".$resume['id'].")");
$exps =$exps->fetch_all(1);

$edus = $db->query("SELECT * FROM educations WHERE (resume_id=".$resume['id'].")");
$edus =$edus->fetch_all(1);


$skills = $db->query("SELECT * FROM skills WHERE (resume_id=".$resume['id'].")");
$skills =$skills->fetch_all(1);


        $columns='';
        $values='';
        unset($resume['id']);
        unset($resume['slug']);
        unset($resume['updated_at']);
        $resume['resume_title']='clone_'.time();

        foreach($resume as $index=>$value){
        $value=$db->real_escape_string($value);
        $columns.=$index.',';
        $values.="'$value',";
        }

        $authid=$fn->Auth()['id'];

    

    $columns.='slug,updated_at';
    $values.="'".$fn->randomstring()."',".time();
   

       
        try {
            $query="INSERT INTO resumes";
            $query.="($columns)";
            $query.="VALUES($values)";

            $db->query($query);
            $new_resume_id=$db->insert_id();
    
            // Clone experiences
            foreach($exps as $exp){
                $query2 = "INSERT INTO experiences(resume_id, position, company, job_desc, started, ended) ";
                $query2 .= "VALUES ('$new_resume_id', 
                          '{$db->real_escape_string($exp['position'])}', 
                          '{$db->real_escape_string($exp['company'])}', 
                          '{$db->real_escape_string($exp['job_desc'])}', 
                          '{$exp['started']}', 
                          '{$exp['ended']}')";
                $db->query($query2);
            }
            // Clone educations
            foreach($edus as $edu){
                $query3 = "INSERT INTO educations(resume_id, course, institute, started, ended) ";
                $query3 .= "VALUES ('$new_resume_id', 
                          '{$db->real_escape_string($edu['course'])}', 
                          '{$db->real_escape_string($edu['institute'])}', 
                          '{$edu['started']}', 
                          '{$edu['ended']}')";
                $db->query($query3);
            }
            // Clone skills
            foreach($skills as $skill){
                $query4 = "INSERT INTO skills(resume_id, skill) ";
                $query4 .= "VALUES ('$new_resume_id', '{$db->real_escape_string($skill['skill'])}')";
                $db->query($query4);
            }
            


            $fn->setAlert('clone created !');
            $fn->redirect("../myresumes.php");


        } catch (Exception $error) {
            $fn->setError($error->getMessage());
            $fn->redirect("../myresumes.php");
        }

?>