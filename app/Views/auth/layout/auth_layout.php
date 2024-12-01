<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->include('auth/partials/head') ?>
</head>

<body>
    <main>
        <?= $this->renderSection('content') ?>
    </main>
    <script src="<?= base_url('assets/admin/js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>