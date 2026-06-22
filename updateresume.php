<?php
$title = "Edit Resume";
require './asstes/includes/header2.php';
require './asstes/includes/navbar.php';
$fn->Authpage();
$slug=$_GET['resume']??'';
$resumes = $db->query("SELECT * FROM resumes WHERE (slug='$slug' AND user_id=".$fn->Auth()['id'].")");
$resume = $resumes->fetch_assoc();
if(!$resume){
    $fn->redirect('myresumes.php');
}
$exps = $db->query("SELECT * FROM experiences WHERE (resume_id=".$resume['id'].")");
$exps =$exps->fetch_all(1);

$edus = $db->query("SELECT * FROM educations WHERE (resume_id=".$resume['id'].")");
$edus =$edus->fetch_all(1);


$skills = $db->query("SELECT * FROM skills WHERE (resume_id=".$resume['id'].")");
$skills =$skills->fetch_all(1);
?>


<div class="container">
    <div class="page-header">
        <h1>Edit Resume</h1>
        <p>Update your information, experience, education, and skills</p>
    </div>

    <div class="glass-card">
            <div class="glass-card-header">
                <h2><i class="bi bi-pencil-square me-2"></i><?= htmlspecialchars($resume['resume_title']) ?></h2>
                <div>
                     <a href="myresumes.php" class="link-back"><i class="bi bi-arrow-left"></i> Dashboard</a>
                </div>
            </div>

            <div>

                <form class="row g-4" action="actions/updateresume.action.php" method="post">
                     <input type="hidden" name="id" value="<?= $resume['id'] ?>"/>
                    <input type="hidden" name="slug" value="<?= $resume['slug'] ?>"/>

                <div class="col-md-6">
                        <label class="form-label">Resume Title</label>
                        <input type="text" name="resume_title" placeholder="Web Developer Consultant" value="<?=@$resume['resume_title']?>" class="form-control" required>
                    </div>
                    <div class="col-12"><div class="section-divider"><i class="bi bi-person-badge"></i><h3>Personal Information</h3></div></div>
                      
                    <div class="col-md-6">
                        <label class="form-label">Full Name</label>
                        <input type="text" value="<?=@$resume['full_name']?>"  name="full_name" placeholder="Nyan Htet Min" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" value="<?=@$resume['email_id']?>" name="email_id" placeholder="nyanhtetmin@gmail.com" class="form-control" required>
                    </div>
                      <div class="col-12">
                        <label for="inputAddress"  class="form-label"> Objective</label>
                        <textarea name="objective"  class="form-control"><?=@$resume['objective']?></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Mobile No</label>
                        <input type="tel"  placeholder="9447490586" value="<?=@$resume['mobile_no']?>" name="mobile_no" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Date Of Birth</label>
                        <input type="date" name="dob" value="<?=@$resume['dob']?>" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Gender</label>
                        <select class="form-select" name="gender">
                            <option <?=($resume['gender']=='Male')?'selected':''?> >Male</option>
                            <option <?=($resume['gender']=='Female')?'selected':''?> >Female</option>
                            <option <?=($resume['gender']=='Transgender')?'selected':''?> >Transgender</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Religion</label>
                        <select class="form-select" name="religion">
                            <option <?=($resume['religion']=='Buddhist')?'selected':''?>>Buddhist</option>
                            <option <?=($resume['religion']=='Christian')?'selected':''?>>Christian</option>
                            <option <?=($resume['religion']=='Islam')?'selected':''?>>Islam</option>
                            <option <?=($resume['religion']=='Other')?'selected':''?>>Other</option>



                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Nationality</label>
                        <select class="form-select" name="nationality">
                            <option <?=($resume['nationality']=='Myanmar')?'selected':''?>>Myanmar</option>
                            <option <?=($resume['nationality']=='Mon')?'selected':''?>>Mon</option>
                            <option <?=($resume['nationality']=='Kachin')?'selected':''?>>Kachin</option>
                            <option <?=($resume['nationality']=='Kayah')?'selected':''?>>Kayah</option>
                            <option <?=($resume['nationality']=='Kayin')?'selected':''?>>Kayin</option>
                            <option <?=($resume['nationality']=='Chin')?'selected':''?>> Chin</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Marital Status</label>
                        <select class="form-select" name="marital_status">
                            <option <?=($resume['marital_status']=='Single')?'selected':''?>>Single</option>
                            <option <?=($resume['marital_status']=='Married')?'selected':''?>>Married</option>
                            <option <?=($resume['marital_status']=='Divorced')?'selected':''?>>Divorced</option>
                            

                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Hobbies</label>
                        <input type="text" value="<?=@$resume['hobbies']?>" name="hobbies" placeholder="Reading Books, Watching Movies" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Languages Known</label>
                        <input type="text" name="languages" value="<?=@$resume['languages']?>" placeholder="English, Burmese, Chinese, Japanese" class="form-control" required>
                    </div>

                    <div class="col-12">
                        <label for="inputAddress"  class="form-label"> Address</label>
                        <input type="text" name="address" value="<?=@$resume['address']?>" class="form-control" id="inputAddress" placeholder="1234 Main St" required>
                    </div>
                    <div class="col-12 d-flex justify-content-between align-items-center flex-wrap gap-2 mt-2">
                        <div class="section-divider flex-grow-1 mb-0"><i class="bi bi-briefcase"></i><h3>Experience</h3></div>
                        <a href="#" class="link-add" data-bs-toggle="modal" data-bs-target="#addexp"><i class="bi bi-plus-circle"></i> Add New</a>
                    </div>


                    <div class="d-flex flex-wrap">
<?php
if($exps){
    foreach($exps as $exp){
        ?>
     <div class="col-12 col-md-6 p-2">
                            <div class="item-card">
                                <div class="d-flex justify-content-between">
                                    <h6><?=$exp['position']?></h6>

                                    <a href="actions/deleteexp.action.php?id=<?=$exp['id']?>&resume_id=<?=$resume['id']?>&slug=<?=$resume['slug']?>" class="btn-remove"><i class="bi bi-x-lg"></i></a>
                                </div>

                                <p class="item-meta">
                                    <i class="bi bi-buildings"></i> <?= $exp['company'] ?> (<?= $exp['started'].'-'.$exp['ended'] ?>)
                                </p>
                                <p class="item-meta">
                                   <?= $exp['job_desc'] ?>
                                </p>

                            </div>
                        </div>
<?php
    }
}else{
    ?>
         
                        <div class="col-12 col-md-6 p-2">
                            <div class="item-card">
                                <div class="d-flex justify-content-between">
                                    <h6>Web Developer Consultant (2+ Years)</h6>
                                    
</div>
                                <p class="item-meta">
                                    if you have experience you can add it
                                </p>

                            </div>
                        </div>
<?php
}
?>

                    </div>

                    <div class="col-12 d-flex justify-content-between align-items-center flex-wrap gap-2 mt-2">
                        <div class="section-divider flex-grow-1 mb-0"><i class="bi bi-journal-bookmark"></i><h3>Education</h3></div>
                        <a href="#" class="link-add" data-bs-toggle="modal" data-bs-target="#addedu"><i class="bi bi-plus-circle"></i> Add New</a>
                    </div>

                    <div class="d-flex flex-wrap">
<?php
if($edus){
    foreach($edus as $edu){
        ?>


                        <div class="col-12 col-md-6 p-2">
                            <div class="item-card">
                                <div class="d-flex justify-content-between">
                                    <h6><?= $edu['course'] ?></h6>
                                    <a href="actions/deleteedu.action.php?id=<?=$edu['id']?>&resume_id=<?=$resume['id']?>&slug=<?=$resume['slug']?>" class="btn-remove"><i class="bi bi-x-lg"></i></a>
                                </div>

                                <p class="item-meta">
                                    <i class="bi bi-book"></i> <?= $edu['institute'] ?>
                                </p>
                                <p class="item-meta">
                                  <?= $edu['started'].'-'.$edu['ended'] ?>
                                </p>

                            </div>
                        </div>
                        <?php
    }
}else{
    ?>

                        <div class="col-12 col-md-6 p-2">
                            <div class="item-card">
                                <div class="d-flex justify-content-between">
                                    <h6>Completed 12th Class (Arts Stream)</h6>
                                    
                                </div>

                                <p class="item-meta">
                                    <i class="bi bi-book"></i>   Put your Educations
                                </p>
                               

                            </div>
                        </div>
<?php
}
?>

                    </div>

                    <div class="col-12 d-flex justify-content-between align-items-center flex-wrap gap-2 mt-2">
                        <div class="section-divider flex-grow-1 mb-0"><i class="bi bi-boxes"></i><h3>Skills</h3></div>
                        <a href="#" class="link-add" data-bs-toggle="modal" data-bs-target="#addskill"><i class="bi bi-plus-circle"></i> Add New</a>
                    </div>

                    <div class="d-flex flex-wrap">

<?php
if($skills){
    foreach($skills as $skill){
        ?>

                        <div class="col-12 p-2">
                            <div class="item-card">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6><i class="bi bi-caret-right"></i><?= $skill['skill'] ?></h6>
                                    <a href="actions/deleteskill.action.php?id=<?=$skill['id']?>&resume_id=<?=$resume['id']?>&slug=<?=$resume['slug']?>" class="btn-remove"><i class="bi bi-x-lg"></i></a>
                                </div>
                            </div>
                        </div><?php
       }
}else{
    ?>

                        <div class="col-12 p-2">
                            <div class="item-card">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6><i class="bi bi-caret-right"></i> if you have Skills you can add it</h6>
                                    
                                </div>
                            </div>
                        </div>
<?php
}
?>



                    </div>



                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-gradient"><i class="bi bi-floppy"></i> Save
                            Resume</button>
                    </div>
                </form>
            </div>



        </div>

    </div>
   

<!-- Modal exp-->
                <div class="modal fade modal-glass" id="addexp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Experience</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form class="row g-3" action="actions/addexperience.action.php" method="post">
                    <input type="hidden" name="resume_id" value="<?= $resume['id'] ?>"/>
                    <input type="hidden" name="slug" value="<?= $resume['slug'] ?>"/>
       <div class="col-12">
    <label for="inputEmail4" class="form-label">Position / Job role</label>
    <input type="text" name="position" class="form-control" id="inputEmail4" placeholder="Web Developer Consultant (2+ Years)" required>
  </div>
  <div class="col-12">
    <label for="inputPassword4" class="form-label">Company</label>
    <input type="text" placeholder="Microsoft Company" name="company" class="form-control" id="inputPassword4" required>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Joined</label>
    <input type="text" name="started" placeholder="October 2020 " class="form-control" id="inputPassword4" required>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Resigned</label>
    <input type="text" name="ended" placeholder="Currently Pursuing" class="form-control" id="inputPassword4" required>
  </div>
  <div class="col-12">
    <label for="inputPassword4" class="form-label">Job description</label>
    <textarea class="form-control" name="job_desc" required></textarea>
  </div>
  
  
  <div class="col-12 text-end">
    <button type="submit" class="btn btn-gradient">Add Experience</button>
  </div>
</form>
                </div>
                
                </div>
  </div>
</div>


<!-- Modal -->
  <!-- Modal edu-->
                <div class="modal fade modal-glass" id="addedu" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Education</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form class="row g-3" action="actions/addeducation.action.php" method="post">
                    <input type="hidden" name="resume_id" value="<?= $resume['id'] ?>"/>
                    <input type="hidden" name="slug" value="<?= $resume['slug'] ?>"/>
       <div class="col-12">
    <label for="inputEmail4" class="form-label">Course / Degree </label>
    <input type="text" name="course" class="form-control" id="inputEmail4" placeholder="Completed 12th Class (Arts Stream)" required>
  </div>
  <div class="col-12">
    <label for="inputPassword4" class="form-label">Institute Board</label>
    <input type="text" placeholder="High School Graduated" name="institute" class="form-control" id="inputPassword4" required>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Started</label>
    <input type="text" name="started" placeholder="October 2020 " class="form-control" id="inputPassword4" required>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Ended</label>
    <input type="text" name="ended" placeholder="Currently Pursuing" class="form-control" id="inputPassword4" required>
  </div>
  
  
  
  <div class="col-12 text-end">
    <button type="submit" class="btn btn-gradient">Add Education</button>
  </div>
</form>
                </div>
                
                </div>
  </div>
</div>


<!-- Modal -->
 <!-- Modal skill-->
                <div class="modal fade modal-glass" id="addskill" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Skill</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form class="row g-3" action="actions/addskill.action.php" method="post">
                     <input type="hidden" name="resume_id" value="<?= $resume['id'] ?>"/>
                    <input type="hidden" name="slug" value="<?= $resume['slug'] ?>"/>
       <div class="col-12">
    <label for="inputEmail4" class="form-label">Skill</label>
    <input type="text" name="skill" class="form-control" id="inputEmail4" placeholder="Basic Knowledge in Computer & Internet" required>
  </div>
  

  
  
  
  <div class="col-12 text-end">
    <button type="submit" class="btn btn-gradient">Add Skill</button>
  </div>
</form>
                </div>
                
                </div>
  </div>
</div>
<?php
require './asstes/includes/footer.php';
?>
