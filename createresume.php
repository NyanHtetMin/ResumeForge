<?php
$title = "Create Resume";
require './asstes/includes/header2.php';
require './asstes/includes/navbar.php';
$fn->Authpage();
?>

<div class="container">
    <div class="page-header">
        <h1>Create Resume</h1>
        <p>Fill in your details to generate a professional CV</p>
    </div>

    <div class="glass-card">
        <div class="glass-card-header">
            <h2><i class="bi bi-file-earmark-plus me-2"></i>New Resume</h2>
            <a href="myresumes.php" class="link-back"><i class="bi bi-arrow-left"></i> Dashboard</a>
        </div>

        <form class="row g-4" action="actions/createresume.action.php" method="post">
            <div class="col-md-6">
                <label class="form-label">Resume Title</label>
                <input type="text" name="resume_title" placeholder="e.g. Senior Web Developer" class="form-control" required>
            </div>

            <div class="col-12">
                <div class="section-divider">
                    <i class="bi bi-person-badge"></i>
                    <h3>Personal Information</h3>
                </div>
            </div>

            <div class="col-md-6">
                <label class="form-label">Full Name</label>
                <input type="text" name="full_name" placeholder="Your full name" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" name="email_id" placeholder="you@email.com" class="form-control" required>
            </div>
            <div class="col-12">
                <label class="form-label">Objective</label>
                <textarea name="objective" class="form-control" rows="3" placeholder="Brief career objective..."></textarea>
            </div>
            <div class="col-md-6">
                <label class="form-label">Mobile No</label>
                <input type="tel" name="mobile_no" placeholder="+1 234 567 8900" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Date Of Birth</label>
                <input type="date" name="dob" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Gender</label>
                <select class="form-select" name="gender">
                    <option>Male</option>
                    <option>Female</option>
                    <option>Transgender</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Religion</label>
                <select class="form-select" name="religion">
                    <option>Buddhist</option>
                    <option>Christian</option>
                    <option>Islam</option>
                    <option>Other</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Nationality</label>
                <select class="form-select" name="nationality">
                    <option>Myanmar</option>
                    <option>Mon</option>
                    <option>Kachin</option>
                    <option>Kayah</option>
                    <option>Kayin</option>
                    <option>Chin</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Marital Status</label>
                <select class="form-select" name="marital_status">
                    <option>Single</option>
                    <option>Married</option>
                    <option>Divorced</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Hobbies</label>
                <input type="text" name="hobbies" placeholder="Reading, Travel..." class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Languages Known</label>
                <input type="text" name="languages" placeholder="English, Burmese..." class="form-control" required>
            </div>
            <div class="col-12">
                <label class="form-label">Address</label>
                <input type="text" name="address" class="form-control" placeholder="City, Country" required>
            </div>
            <div class="col-12 text-end pt-2">
                <button type="submit" class="btn btn-gradient">
                    <i class="bi bi-check2-circle me-2"></i>Create Resume
                </button>
            </div>
        </form>
    </div>
</div>

<?php require './asstes/includes/footer.php'; ?>
