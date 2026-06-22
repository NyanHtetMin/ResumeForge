<?php
$title = "Register";
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
            <h2>Create your account</h2>
            <p class="auth-subtitle">Start building professional resumes today</p>
            <form action="actions/register.action.php" method="post">
                <div class="auth-input-group">
                    <label for="full_name">Full name</label>
                    <div class="auth-input-wrap">
                        <input type="text" id="full_name" name="full_name" placeholder="Jane Doe" required>
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="auth-input-group">
                    <label for="email">Email address</label>
                    <div class="auth-input-wrap">
                        <input type="email" id="email" name="email_id" placeholder="you@company.com" required>
                        <i class="bi bi-envelope"></i>
                    </div>
                </div>
                <div class="auth-input-group">
                    <label for="password">Password</label>
                    <div class="auth-input-wrap">
                        <input type="password" id="password" name="password" placeholder="Min. 8 characters" required>
                        <i class="bi bi-lock"></i>
                    </div>
                </div>
                <button type="submit" class="btn btn-gradient auth-submit">
                    <i class="bi bi-rocket-takeoff me-2"></i>Get started free
                </button>
                <div class="auth-links-row">
                    <a href="forgot-password.php">Forgot password?</a>
                    <a href="index.php">Sign in</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require './asstes/includes/footer-auth.php'; ?>
