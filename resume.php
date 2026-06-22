<?php 
require 'asstes/classes/database.class.php';
require 'asstes/classes/function.class.php';

$slug=$_GET['resume']??'';
$resumes = $db->query("SELECT * FROM resumes WHERE (slug='$slug')");
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

$bgFile = !empty($resume['background']) ? $resume['background'] : 'tile1.png';
$bgUrl = 'asstes/images/tiles/' . $bgFile;
$pageFont = ($resume['font'] === 'oo' || $resume['font'] === '') ? 'inherit' : $resume['font'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($resume['full_name'] . ' | ' . $resume['resume_title']) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Caveat&family=Dancing+Script&family=Exo&family=Fuggles&family=Gloria+Hallelujah&family=Mooli&family=Nunito&family=Zilla+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="asstes/css/app.css">
    <link rel="icon" href="asstes/images/logo.png">
    <style>
        body.resume-view-body {
            margin: 0;
            padding: 0;
            font-size: 12pt;
            background-color: #0e1118;
            background-image: url(./<?= htmlspecialchars($bgUrl) ?>);
            background-size: 380px auto;
            background-repeat: repeat;
            background-position: center center;
            background-attachment: fixed;
        }
        .resume-preview-bg {
            background-image: url(./<?= htmlspecialchars($bgUrl) ?>);
            background-size: 380px auto;
            background-repeat: repeat;
            background-position: center center;
            background-attachment: fixed;
        }
        .tile-picker .tile.is-active {
            border-color: #22d3ee;
            box-shadow: 0 0 0 3px rgba(34, 211, 238, 0.45);
        }
        .page {
            width: 21cm;
            min-height: 29.7cm;
            padding: 0.5cm;
            margin: 0.5cm auto;
            border: 1px #e2e8f0 solid;
            border-radius: 4px;
            background: white;
            box-shadow: 0 8px 40px rgba(0, 0, 0, 0.35);
            color: #1a1a1a;
        }
        @page { size: A4; margin: 0; }
        @media print {
            .resume-toolbar, .extra { display: none !important; }
            body.resume-view-body { background: white !important; }
            .page {
                margin: 0; border: none; border-radius: 0;
                width: auto; min-height: auto; box-shadow: none;
                page-break-after: always;
            }
        }
        table { border-collapse: collapse; }
        .pr { padding-right: 30px; }
        .pd-table td { padding: 3px 10px 3px 0; }
    </style>
</head>
<body class="resume-view-body">

<div class="extra resume-toolbar">
<div class="container-fluid d-flex flex-wrap justify-content-center gap-2 py-2">
    <?php
    $actual_link =(empty($_SERVER['HTTPS'])?'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    ?>
    <a href="whatsapp://send?text=<?= $actual_link ?>" class="btn btn-toolbar btn-sm"><i class="bi bi-whatsapp me-1"></i>Share</a>
    <button class="btn btn-toolbar btn-sm" id="print"><i class="bi bi-printer me-1"></i>Print</button>
    <button class="btn btn-toolbar btn-sm" data-bs-toggle="offcanvas" data-bs-target="#background"><i class="bi bi-palette me-1"></i>Background</button>
    <button class="btn btn-toolbar btn-sm" data-bs-toggle="offcanvas" data-bs-target="#font"><i class="bi bi-type me-1"></i>Font</button>
    <button class="btn btn-toolbar btn-sm" id="downloadpdf"><i class="bi bi-file-earmark-pdf me-1"></i>Download</button>
</div>
</div>

<div class="resume-preview-bg" id="resumePreviewBg" data-background="<?= htmlspecialchars($bgFile) ?>">
<div class="page" style="font-family: <?= $pageFont === 'inherit' ? 'inherit' : $resume['font'] ?>">
    <div class="subpage">
        <table class="w-100">
            <tbody>
                <tr>
                    <td colspan="2" class="text-center fw-bold fs-4">Resume</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="personal-info zsection">
                        <div class="fw-bold name"><?= $resume['full_name']?></div>
                        <div>Mobile : <span class="mobile"><?= $resume['mobile_no']?></span></div>
                        <div>Email : <span class="email"><?= $resume['email_id']?></span></div>
                        <div>Address : <span class="address"><?= $resume['address']?></span></div>
                        <hr>
                    </td>
                </tr>

                <tr class="objective-section zsection">
                    <td class="fw-bold align-top text-nowrap pr title">Objective</td>
                    <td class="pb-3 objective">
                       <?= $resume['objective'] ?>
                    </td>
                </tr>

                <tr class="experience-section zsection">
                    <td class="fw-bold align-top text-nowrap pr title">Experience</td>
                    <td class="pb-3 experiences">

<?php
if($exps){
    foreach($exps as $exp){
        ?>
 <div class="experience mb-2">
                            <div class="fw-bold">- <span class="job-role"><?= $exp['position'] ?></span> 
                            </div>
                            <div class="company"><?= $exp['company'] ?></div>
                            <div><span class="working-from"><?= $exp['started'] ?></span> – <span class="working-to"><?= $exp['ended'] ?></span></div>
                            <div class="work-description"><?= $exp['job_desc'] ?></div>
                        </div>
<?php
    }
}else{
?>
<div class="experience mb-2">
    <div class="company">I am a Fresher.</div>
</div>
<?php
}
?>
                    </td>
                </tr>

                <tr class="education-section zsection">
                    <td class="fw-bold align-top text-nowrap pr title">Education</td>
                    <td class="pb-3 educations">
                        
<?php
if($edus){
    foreach($edus as $edu){
        ?>
 <div class="education mb-2">
                            <div class="fw-bold">- <span class="course"><?= $edu['course'] ?></span></div>
                            <div class="institute"><?= $edu['institute'] ?></div>
                            <div><span class="working-from"><?= $edu['started'] ?></span> – <span class="working-to"><?= $edu['ended'] ?></span></div>
                        </div>

<?php
    }
}else{
?>
<div class="education mb-2">
    <div class="institute">I don't have any education.</div>
</div>
<?php
}
?>
                        



                    </td>
                </tr>

                <tr class="skills-section zsection">
                    <td class="fw-bold align-top text-nowrap pr title">Skills</td>
                    <td class="pb-3 skills">
<?php
if($skills){
    foreach($skills as $skill){
        ?>
        <div class="skill">- <?= $skill['skill'] ?></div>

<?php
    }
}else{
?>
<div class="skill">- I have no skills.</div>
<?php
}
?>
                        

                    </td>
                </tr>

                <tr class="personal-details-section zsection">
                    <td class="fw-bold align-top text-nowrap pr title">Personal Details</td>
                    <td class="pb-3">
                        <table class="pd-table">
                            <tr>
                                <td>Date of Birth</td>
                                <td>: <span class="date-of-birth"><?= $resume['dob'] ?></span></td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td>: <span class="gender"><?= $resume['gender'] ?></span></td>
                            </tr>
                            <tr>
                                <td>Religion</td>
                                <td>: <span class="religion"><?= $resume['religion'] ?></span></td>
                            </tr>
                            <tr>
                                <td>Nationality</td>
                                <td>: <span class="nationality"><?= $resume['nationality'] ?></span></td>
                            </tr>
                            <tr>
                                <td>Marital Status</td>
                                <td>: <span class="marital-status"><?= $resume['marital_status'] ?></span></td>
                            </tr>
                            <tr>
                                <td>Hobbies</td>
                                <td>: <span class="hobbies"><?= $resume['hobbies'] ?></span></td>
                            </tr>

                        </table>

                    </td>
                </tr>

                <tr class="languages-known-section zsection">
                    <td class="fw-bold align-top text-nowrap pr title">Languages Known</td>
                    <td class="pb-3 languages">

                        <?= $resume['languages'] ?>
                    </td>
                </tr>

                <tr class="declaration-section zsection">
                    <td class="fw-bold align-top text-nowrap pr title">Declaration</td>
                    <td class="pb-5 declaration">
                        I hereby declare that above information is correct to the best of my
                        knowledge and can be supported by relevant documents as and when
                        required.
                    </td>
                </tr>
                <tr>
                    <td class="px-3">Date : <?= date('d-m-Y') ?></td>
                    <td class="px-3 name text-end"><?= $resume['full_name'] ?></td>

                </tr>
            </tbody>
        </table>
    </div>

</div>
</div>

<div class="offcanvas offcanvas-bottom offcanvas-glass" tabindex="-1" id="background" style="height: 50vh" aria-labelledby="offcanvasBottomLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasBottomLabel"><i class="bi bi-palette me-2"></i>Change Background</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body w-100 tile-picker">
    <div class="d-flex w-100 gap-2 flex-wrap justify-content-center">
        <?php
        for($i=1;$i<=22;$i++){
            ?>
            <div class="tile rounded shadow-sm border"  data-background="tile<?= $i ?>.png" style="background-image: url(asstes/images/tiles/tile<?= $i ?>.png)"></div>
            <?php
        }
        ?>
        <div class="tile rounded shadow-sm border" data-background="tile23.jpg" style="background-image: url(asstes/images/tiles/tile23.jpg)"></div>
    </div>
    
    
  </div>
</div>

<div class="offcanvas offcanvas-bottom offcanvas-glass" tabindex="-1" id="font" aria-labelledby="offcanvasFontLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasFontLabel"><i class="bi bi-type me-2"></i>Change Font</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <label for="fontS" class="form-label text-light mb-2">Choose a font for your resume</label>
    <select class="form-select form-select-lg" id="fontS">
      <option value="oo" <?= ($resume['font'] === 'oo' || $resume['font'] === '') ? 'selected' : '' ?>>System Font (Default)</option>
      <option value="'Poppins', sans-serif" <?= $resume['font'] === "'Poppins', sans-serif" ? 'selected' : '' ?>>Poppins</option>
      <option value="'Caveat', cursive" <?= $resume['font'] === "'Caveat', cursive" ? 'selected' : '' ?>>Caveat</option>
      <option value="'Dancing Script', cursive" <?= $resume['font'] === "'Dancing Script', cursive" ? 'selected' : '' ?>>Dancing Script</option>
      <option value="'Exo', sans-serif" <?= $resume['font'] === "'Exo', sans-serif" ? 'selected' : '' ?>>Exo</option>
      <option value="'Fuggles', cursive" <?= $resume['font'] === "'Fuggles', cursive" || $resume['font'] === "'Fuggles', cursive'" ? 'selected' : '' ?>>Fuggles</option>
      <option value="'Gloria Hallelujah', cursive" <?= $resume['font'] === "'Gloria Hallelujah', cursive" ? 'selected' : '' ?>>Gloria Hallelujah</option>
      <option value="'Mooli', sans-serif" <?= $resume['font'] === "'Mooli', sans-serif" ? 'selected' : '' ?>>Mooli</option>
      <option value="'Nunito', sans-serif" <?= $resume['font'] === "'Nunito', sans-serif" ? 'selected' : '' ?>>Nunito</option>
      <option value="'Zilla Slab', serif" <?= $resume['font'] === "'Zilla Slab', serif" ? 'selected' : '' ?>>Zilla Slab</option>
    </select>
    
  </div>
</div>
 <script src="asstes/js/jquery-3.7.1.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
 <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
 <script  src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>




<script>
  $("#downloadpdf").click(function(){
    html2canvas(document.querySelector(".page"), {
        scale: 2
    }).then(canvas => {
        const imgData = canvas.toDataURL("image/png");
        const pdf = new jspdf.jsPDF("p","mm","a4");

        const imgWidth = 210;
        const imgHeight = canvas.height * imgWidth / canvas.width;

        pdf.addImage(imgData, "PNG", 0, 0, imgWidth, imgHeight);
        pdf.save("<?=$resume['full_name']?>.pdf");
    });
});








    function applyResumeFont(font) {
        const cssFont = (font === 'oo' || !font) ? 'inherit' : font;
        $('.page').css('font-family', cssFont);
    }

    function applyResumeBackground(tile) {
        const url = 'url(asstes/images/tiles/' + tile + ')';
        $('body.resume-view-body, .resume-preview-bg').css({
            'background-image': url,
            'background-size': '380px auto',
            'background-repeat': 'repeat',
            'background-position': 'center center',
            'background-attachment': 'fixed'
        });
        $('#resumePreviewBg').attr('data-background', tile);
        $('.tile').removeClass('is-active');
        $('.tile[data-background="' + tile + '"]').addClass('is-active');
    }

    $('#fontS').on('change', function() {
        const font = $(this).val();
        applyResumeFont(font);

        $.ajax({
            url: 'actions/changefont.action.php',
            method: 'post',
            data: {
                resume_id: <?= (int) $resume['id'] ?>,
                font: font
            },
            error: function() {
                alert('Font could not be saved. Please try again.');
            }
        });
    });

    $(document).on('click', '.tile', function() {
        const tile = $(this).data('background');
        applyResumeBackground(tile);

        $.ajax({
            url: 'actions/changeback.action.php',
            method: 'post',
            data: {
                resume_id: <?= (int) $resume['id'] ?>,
                background: tile
            },
            error: function() {
                alert('Background could not be saved. Please try again.');
            }
        });
    });
    $("#print").click(function(){
       $(".extra").hide();
      window.print();

      setTimeout(()=>{
        $(".extra").show();
      },500)
    })
</script>
</body>
</html>