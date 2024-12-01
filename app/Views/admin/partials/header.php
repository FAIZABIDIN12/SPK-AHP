<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-6">
                <div class="header-left d-flex align-items-center">
                    <div class="menu-toggle-btn mr-15">
                        <button id="menu-toggle" class="main-btn primary-btn btn-hover">
                            <i class="lni lni-chevron-left me-2"></i> Menu
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-6">
                <div class="header-right d-flex align-items-center justify-content-end">
                    <div class="profile-box ml-15">
                        <div class="dropdown">
                            <button class="btn bg-transparent border-0" type="button" id="profile" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="profile-info d-flex align-items-center">

                                    <div class="text-start">

                                    </div>
                                </div>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                                <li>
                                    <a href="<?= route_to('profile') ?>">
                                        <i class="lni lni-user"></i> View Profile
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="ml-3">
                        <a href="<?= route_to('logout') ?>" class="btn btn-outline-primary">
                            <i class="lni lni-exit"></i> Sign Out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>