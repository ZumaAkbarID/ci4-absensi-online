<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?= base_url(); ?>">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?= base_url(); ?>">St</a>
        </div>
        <ul class="sidebar-menu">

            <?php if ($session->get('role') == 'Administrator') : ?>
            <li class="menu-header">Dashboard</li>
            <li class="<?= ($page == 'dashboard') ? 'active' : ''; ?>">
                <a href="<?= base_url('admin'); ?>" class="nav-link"><i
                        class="fas fa-home"></i><span>Dashboard</span></a>
            </li>
            <?php elseif ($session->get('role') == 'Pengajar') : ?>
            <li class="menu-header">Dashboard</li>
            <li class="<?= ($page == 'dashboard') ? 'active' : ''; ?>">
                <a href="<?= base_url('pengajar'); ?>" class="nav-link"><i
                        class="fas fa-home"></i><span>Dashboard</span></a>
            </li>
            <?php elseif ($session->get('role') == 'Siswa') : ?>
            <li class="menu-header">Beranda</li>
            <li class="<?= ($page == 'beranda') ? 'active' : ''; ?>">
                <a href="<?= base_url('siswa'); ?>" class="nav-link"><i class="fas fa-home"></i><span>Beranda</span></a>
            </li>
            <?php endif; ?>

            <?php if ($session->get('role') == 'Administrator') : ?>
            <li class="menu-header">Admin Menu</li>
            <li class="dropdown <?= ($page == 'users') ? 'active' : ''; ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i>
                    <span>Users</span></a>
                <ul class="dropdown-menu">
                    <li class="<?= ($subpage == 'pengajar') ? 'active' : ''; ?>"><a class="nav-link"
                            href="<?= base_url('admin/pengajar'); ?>">Kelola Pengajar</a></li>
                    <li class="<?= ($subpage == 'siswa') ? 'active' : ''; ?>"><a class="nav-link"
                            href="<?= base_url('admin/siswa'); ?>">Kelola Siswa</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="<?= base_url('admin/kelas'); ?>"><i class="fas fa-fire"></i> <span>Kelola
                        Kelas</span></a></li>
            <li><a class="nav-link" href="<?= base_url('admin/absensi'); ?>"><i class="fas fa-fire"></i> <span>Semua
                        Absensi</span></a></li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i>
                    <span>Pelajaran</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?= base_url('admin/mapel'); ?>">Kelola Mata Pelajaran</a></li>
                    <li><a class="nav-link" href="<?= base_url('admin/semester'); ?>">Kelola Semester</a></li>
                </ul>
            </li>
            <?php endif; ?>

            <li class="menu-header">Lainnya</li>
            <li><a class="nav-link" href="<?= base_url('auth/logout'); ?>"><i class="fas fa-pencil-ruler"></i>
                    <span>Logout</span></a></li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
    </aside>
</div>