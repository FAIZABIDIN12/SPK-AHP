<?= $this->extend('auth/layout/auth_layout') ?>

<?= $this->section('content') ?>
<div class="container-sm my-3">
    <div class="row g-0 auth-row shadow">
        <div class="col-lg-6">
            <div class="auth-cover-wrapper bg-primary-100">
                <div class="auth-cover">
                    <div class="title text-center">
                        <h1 class="text-primary mb-10">Get Started</h1>
                        <p class="text-medium">
                            Start creating the best possible user experience
                            <br class="d-sm-block" />
                            for you customers.
                        </p>
                    </div>
                    <!-- <div class="cover-image">
                        <img src="<?= base_url('assets/admin/images/auth/signin-image.svg') ?>" alt="" />
                    </div> -->
                    <div class="shape-image">
                        <img src="<?= base_url('assets/admin/images/auth/shape.svg') ?>" alt="" />
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
        <div class="col-lg-6">
            <div class="signup-wrapper">
                <div class="form-wrapper">
                    <h6 class="mb-15">Sign Up</h6>
                    <p class="text-sm mb-25">
                    </p>
                    <form action="<?= route_to('signup') ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="input-style-1">
                                    <label for="name">Name</label>
                                    <input class="<?= isset(session()->get('errors')['name']) ? 'form-control is-invalid' : '' ?>" type="text" name="name" id="name" placeholder="Name" value="<?= old('name') ?>">
                                    <?php if (isset(session()->get('errors')['name'])) : ?>
                                        <div class="invalid-feedback">
                                            <?= session()->get('errors')['name'] ?>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-style-1">
                                    <label for="username">Username</label>
                                    <input class="<?= isset(session()->get('errors')['username']) ? 'form-control is-invalid' : '' ?>" type="text" name="username" id="username" placeholder="Username" value="<?= old('username') ?>">
                                    <?php if (isset(session()->get('errors')['username'])) : ?>
                                        <div class="invalid-feedback">
                                            <?= session()->get('errors')['username'] ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-style-1">
                                    <label for="email">Email</label>
                                    <input class="<?= isset(session()->get('errors')['email']) ? 'form-control is-invalid' : '' ?>" type="email" name="email" id="email" placeholder="Email" value="<?= old('email') ?>">
                                    <?php if (isset(session()->get('errors')['email'])) : ?>
                                        <div class="invalid-feedback">
                                            <?= session()->get('errors')['email'] ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-style-1">
                                    <label for="password">Password</label>
                                    <input class="<?= isset(session()->get('errors')['password']) ? 'form-control is-invalid' : '' ?>" type="password" name="password" id="password" placeholder="Password">
                                    <?php if (isset(session()->get('errors')['password'])) : ?>
                                        <div class="invalid-feedback">
                                            <?= session()->get('errors')['password'] ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="select-style-1">
                                    <label>Role</label>
                                    <div class="select-position">
                                        <select class="text-capitalize" name="role_id">
                                            <option value="" disabled selected>Select role</option>
                                            <?php foreach ($roles as $role) : ?>
                                                <option value="<?= $role['id'] ?>"><?= $role['role_name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <?php if (isset(session()->get('errors')['role_id'])) : ?>
                                        <div class="alert-box danger-alert mt-3">
                                            <div class="alert">
                                                <?= session()->get('errors')['role_id'] ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                            <div class="col-12">
                                <div class="button-group d-flex justify-content-center flex-wrap">
                                    <button class="main-btn primary-btn btn-hover w-100 text-center">
                                        Sign Up
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
</div>
<?= $this->endSection() ?>