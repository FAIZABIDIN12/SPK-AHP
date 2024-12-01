<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->include('admin/partials/head') ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>
    <div id="preloader">
        <div class="spinner"></div>
    </div>

    <?= $this->include('admin/partials/sidebar') ?>

    <div class="overlay"></div>

    <main class="main-wrapper">
        <?= $this->include('admin/partials/header') ?>

        <section class="section">
            <div class="container-fluid">
                <?= $this->renderSection('content') ?>
            </div>
        </section>

        <?= $this->include('admin/partials/footer') ?>
    </main>
    <?= $this->include('admin/partials/js') ?>
    <?= $this->renderSection('script') ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>