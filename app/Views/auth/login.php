<?= $this->extend('auth/layout/auth_layout') ?>

<?= $this->section('content') ?>
<div class="container-sm mt-2">
    <div class="row g-0 justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-6">
            <div class="signin-wrapper mt-2 p-4 shadow-sm rounded bg-white">
                <div class="form-wrapper">
                    <div class="auth-cover text-center mb-4" style=" margin-top: -60px;">
                        <h1 class="text-primary mb-10">Selamat Datang</h1>
                        <p class="text-medium">
                            Masukkan Username & Password untuk login!
                        </p>
                    </div>
                    <h6 class="mb-15" style="margin-top: 40px;">Sign In</h6>
                    <form action="<?= route_to('authenticate') ?>" method="post">
                        <div class="mb-3">
                            <label for="identifier" class="form-label">Username or Email</label>
                            <input type="text" name="identifier" id="identifier" class="form-control <?= session()->has('error') ? 'is-invalid' : '' ?>" placeholder="Username or Email" value="<?= old('identifier') ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control <?= session()->has('error') ? 'is-invalid' : '' ?>" placeholder="Password" required>
                        </div>
                        <div class="d-flex justify-content-center flex-wrap">
                            <button class="main-btn primary-btn btn-hover w-100 text-center">
                                Sign In
                            </button>
                        </div>
                    </form>

                    <?php if (session()->get('error')) : ?>
                        <div class="alert alert-danger mt-3">
                            <?= session()->get('error') ?>
                        </div>
                    <?php endif ?>

                    <?php if (session()->get('message')) : ?>
                        <div class="alert alert-success mt-3">
                            <?= session()->get('message') ?>
                        </div>
                    <?php endif ?>

                    <?php if (session()->get('errors')) : ?>
                        <div class="alert alert-danger mt-3">
                            <ul>
                                <?php foreach (session()->get('errors') as $error) : ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>