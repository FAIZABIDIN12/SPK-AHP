<aside class="sidebar-nav-wrapper">
    <div class="navbar-logo">
        <a class="d-flex align-items-center gap-1" href="<?= route_to('dashboard') ?>">
            <div class="d-flex align-items-center gap-1">
                <h1 class="fs-4">SPK-AHP</h1>
            </div>
        </a>
    </div>
    <nav class="sidebar-nav">
        <ul>
            <li class="nav-item">
                <a href="<?= route_to('dashboard') ?>">
                    <span class="icon">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 9V19H17V9H3ZM3 5H17V7H3V5Z" />
                        </svg>
                    </span>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= route_to('kos') ?>">
                    <span class="icon">
                        <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M20 20H4V9H1L12 3L23 9H20V20Z" />
                        </svg>
                    </span>
                    <span class="text">Kos</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= route_to('kriteria') ?>">
                    <span class="icon">
                        <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M3 12H21V10H3V12ZM3 16H21V14H3V16ZM3 8H21V6H3V8Z" />
                        </svg>
                    </span>
                    <span class="text">Kriteria</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= route_to('comparisons') ?>">
                    <span class="icon">
                        <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M12 2L15 8H20L16 12L18 18L12 14L6 18L8 12L4 8H9L12 2Z" />
                        </svg>
                    </span>
                    <span class="text">Perbandingan Matrix</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= route_to('peramalan') ?>">
                <span class="icon">
                        <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <title>history</title>
                            <path d="M13.5,8H12V13L16.28,15.54L17,14.33L13.5,12.25V8M13,3A9,9 0 0,0 4,12H1L4.96,16.03L9,12H6A7,7 0 0,1 13,5A7,7 0 0,1 20,12A7,7 0 0,1 13,19C11.07,19 9.32,18.21 8.06,16.94L6.64,18.36C8.27,20 10.5,21 13,21A9,9 0 0,0 22,12A9,9 0 0,0 13,3" />
                        </svg>
                    </span>
                    <span class="text">History</span>
                </a>
            </li>
            <span class="divider">
                <hr />
            </span>
        </ul>
    </nav>
</aside>
