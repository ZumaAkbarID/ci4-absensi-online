<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <?php if ($session->get('role') == 'Administrator' || $session->get('role') == 'Pengajar') : ?>
                <img alt="image" src="<?= base_url(); ?>/data/img/avatar/pengajar/<?= $session->get('avatar'); ?>"
                    class="rounded-circle mr-1">
                <?php else : ?>
                <img alt="image" src="<?= base_url(); ?>/data/img/avatar/siswa/<?= $session->get('avatar'); ?>"
                    class="rounded-circle mr-1">
                <?php endif; ?>
                <div class="d-sm-none d-lg-inline-block">Hai, <?= $session->get('nama'); ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>