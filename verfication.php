<?php
$title = "Verification";
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
            <h2>Verify your email</h2>
            <p class="auth-subtitle">Enter the 6-digit code we sent you</p>
            <span class="auth-email-badge"><i class="bi bi-envelope-check"></i> <?= htmlspecialchars($email) ?></span>
            <form action="actions/verification.action.php" method="post">
                <div class="auth-input-group">
                    <label for="otp">Verification code</label>
                    <div class="auth-input-wrap">
                        <input type="number" id="otp" name="otp" placeholder="000000" required>
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <button type="submit" class="btn btn-gradient auth-submit">
                    <i class="bi bi-check-circle me-2"></i>Verify email
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
