<?php
$title = "Profile";
require './asstes/includes/header2.php';
require './asstes/includes/navbar.php';
$fn->Authpage();
$user = $db->query("SELECT full_name,email_id FROM users WHERE id='" . $fn->Auth()['id'] . "'");
$user = $user->fetch_assoc();
?>

<div class="container">
    <div class="page-header">
        <h1>Account Settings</h1>
        <p>Update your profile information and password</p>
    </div>

    <div class="glass-card">
        <div class="glass-card-header">
            <h2><i class="bi bi-person-gear me-2 text-info"></i>Edit Profile</h2>
            <a href="javascript:history.back()" class="link-back"><i class="bi bi-arrow-left"></i> Back</a>
        </div>

        <form class="row g-4" method="post" action="actions/updateprofile.action.php">
            <div class="col-md-6">
                <label class="form-label">Full Name</label>
                <input type="text" name="full_name" value="<?= htmlspecialchars(@$user['full_name']) ?>" class="form-control" placeholder="Your name" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" name="email_id" value="<?= htmlspecialchars(@$user['email_id']) ?>" class="form-control" placeholder="you@email.com" required>
            </div>
            <div class="col-12">
                <label class="form-label">New Password</label>
                <input type="password" name="password" class="form-control" placeholder="Leave blank to keep current password">
            </div>
            <div class="col-12 text-end">
                <button type="submit" class="btn btn-gradient">
                    <i class="bi bi-check2-circle me-2"></i>Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

<?php require './asstes/includes/footer.php'; ?>
