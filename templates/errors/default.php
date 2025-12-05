<?php require_once __DIR__ . '/../header.php'; ?>

<?php if ($error) { ?>
    <div class="alert alert-danger">
        <?= $error; ?>
    </div>
<?php } ?>
<?php require_once __DIR__ . '/../footer.php'; ?>