<?php
$title = "Change Password";
require './asstes/includes/header.php';
$fn->nonAuthpage();
$email = $fn->getSession('email') == '' ? $fn->redirect('forgot-password.php') : $fn->getSession('email');
?>
<div class="auth-layout">
    <?php require './asstes/includes/auth-brand.php'; ?>
    <div class="auth-form-side">
        <div class="auth-card">
            <div class="auth-mobile-logo">
                <div class="logo-mark"><i class="bi bi-file-earmark-person-fill text-white"></i></div>
                <span>ResumeForge</span>
            </div>
            <h2>New password</h2>
            <p class="auth-subtitle">Choose a strong password for your account</p>
            <span class="auth-email-badge"><i class="bi bi-envelope-check"></i> <?= htmlspecialchars($email) ?></span>
            <form action="actions/changepassword.action.php" method="post">
                <div class="auth-input-group">
                    <label for="password">New password</label>
                    <div class="auth-input-wrap">
                        <input type="password" id="password" name="password" placeholder="••••••••" required>
                        <i class="bi bi-key"></i>
                    </div>
                </div>
                <button type="submit" class="btn btn-gradient auth-submit">
                    <i class="bi bi-shield-check me-2"></i>Update password
                </button>
                <div class="auth-links-row">
                    <a href="register.php">Register</a>
                    <a href="index.php">Sign in</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require './asstes/includes/footer-auth.php'; ?>
