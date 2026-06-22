<?php
$title = "Login";
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
            <h2>Welcome back</h2>
            <p class="auth-subtitle">Sign in to manage your resumes</p>
            <form action="actions/login.action.php" method="post">
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
                        <input type="password" id="password" name="password" placeholder="••••••••" required>
                        <i class="bi bi-lock"></i>
                    </div>
                </div>
                <div class="auth-options">
                    <label><input type="checkbox" class="form-check-input me-1"> Remember me</label>
                    <a href="forgot-password.php">Forgot password?</a>
                </div>
                <button type="submit" class="btn btn-gradient auth-submit">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Sign in
                </button>
                <p class="auth-footer-text">
                    Don't have an account? <a href="register.php">Create one free</a>
                </p>
            </form>
        </div>
    </div>
</div>
<?php require './asstes/includes/footer-auth.php'; ?>
