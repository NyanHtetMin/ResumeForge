<?php
$title = "Forgot Password";
require './asstes/includes/header.php';
$fn->nonAuthpage();
?>
<div class="auth-layout">
    <?php require './asstes/includes/auth-brand.php'; ?>
    <div class="auth-form-side">
        <div class="auth-card">
            <div class="auth-mobile-logo">
                <div class="logo-mark"><i class="bi bi-file-earmark-person-fill text-white"></i></div>
                <span>ResumeForge</span>
            </div>
            <h2>Reset password</h2>
            <p class="auth-subtitle">We'll send a verification code to your email</p>
            <form action="actions/sentcode.action.php" method="post">
                <div class="auth-input-group">
                    <label for="email">Email address</label>
                    <div class="auth-input-wrap">
                        <input type="email" id="email" name="email_id" placeholder="you@company.com" required>
                        <i class="bi bi-envelope"></i>
                    </div>
                </div>
                <button type="submit" class="btn btn-gradient auth-submit">
                    <i class="bi bi-send me-2"></i>Send verification code
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
