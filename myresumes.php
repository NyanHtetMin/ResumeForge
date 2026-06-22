<?php
require './asstes/includes/header2.php';
require './asstes/includes/navbar.php';
$fn->Authpage();
$resumes = $db->query('SELECT * FROM resumes WHERE user_id=' . $fn->Auth()['id'] . ' ORDER BY id DESC');
$resumes = $resumes->fetch_all(1);
?>

<div class="container">
    <div class="page-header d-flex flex-wrap justify-content-between align-items-end gap-3">
        <div>
            <h1>Your Resumes</h1>
            <p>Manage, edit, and share all your CVs in one place</p>
        </div>
        <a href="createresume.php" class="btn btn-gradient">
            <i class="bi bi-plus-lg me-2"></i>New Resume
        </a>
    </div>

    <div class="glass-card">
        <?php if ($resumes): ?>
        <div class="row g-3">
            <?php foreach ($resumes as $resume): ?>
            <div class="col-12 col-md-6 col-xl-4">
                <article class="resume-card">
                    <h3><?= htmlspecialchars($resume['resume_title']) ?></h3>
                    <p class="meta">
                        <i class="bi bi-clock-history me-1"></i>
                        Updated <?= date('M j, Y · g:i A', $resume['updated_at']) ?>
                    </p>
                    <div class="resume-actions">
                        <a href="resume.php?resume=<?= $resume['slug'] ?>" target="_blank">
                            <i class="bi bi-eye me-1"></i>View
                        </a>
                        <a href="updateresume.php?resume=<?= $resume['slug'] ?>">
                            <i class="bi bi-pencil me-1"></i>Edit
                        </a>
                        <a href="actions/clonecv.action.php?resume=<?= $resume['slug'] ?>">
                            <i class="bi bi-copy me-1"></i>Clone
                        </a>
                        <a href="actions/deleteresume.action.php?id=<?= $resume['id'] ?>" class="action-danger">
                            <i class="bi bi-trash me-1"></i>Delete
                        </a>
                    </div>
                </article>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <div class="empty-state">
            <i class="bi bi-file-earmark-text"></i>
            <p class="mb-3">No resumes yet. Create your first professional CV.</p>
            <a href="createresume.php" class="btn btn-gradient btn-sm">
                <i class="bi bi-plus-lg me-1"></i>Create Resume
            </a>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php require './asstes/includes/footer.php'; ?>
