<?= $this->extend('Admin/templates/layout'); ?>
<?= $this->section('content'); ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Siswa Aktif</h4>
                        </div>
                        <div class="card-body">
                            <?= $siswa->where('status', 'Aktif')->countAll(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Mapel</h4>
                        </div>
                        <div class="card-body">
                            <?= $mapel->countAll(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Absensi</h4>
                        </div>
                        <div class="card-body">
                            <?= $absensi->countAll(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-circle"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Online Users</h4>
                        </div>
                        <div class="card-body">
                            47
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Total Absensi per-Mapel</h4>
                    </div>
                    <div class="card-body">

                        <?php
                        foreach ($mapel->findAll() as $mapels) :
                            $allAbsen = $absensi->countAll();
                            $totalAbsen = $absensi->where('id_mapel', $mapels->id)->countAllResults();
                            $persenan = round($totalAbsen / $allAbsen * 100);
                        ?>
                        <div class="mb-4">
                            <div class="text-small float-right font-weight-bold text-muted">
                                <?= $totalAbsen . ' (' . $persenan . '%)'; ?></div>
                            <div class="font-weight-bold mb-1"><?= $mapels->nama_mapel; ?></div>
                            <div class="progress" data-height="3">
                                <div class="progress-bar" role="progressbar" data-width="<?= $persenan; ?>%"
                                    aria-valuenow="<?= $persenan; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Absensi terbaru</h4>
                        <div class="card-header-action">
                            <a href="<?= base_url('admin/absensi'); ?>" class="btn btn-primary">Lihat Semua</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>Mapel</th>
                                        <th>Siswa</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($absensi->limit(5)->find() as $absens) :
                                        $currentMapel = $mapel->where('id', $absens->id_mapel)->first();
                                        $currentSiswa = $siswa->where('id', $absens->id_siswa)->first();
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $currentMapel->nama_mapel; ?>
                                            <div class="table-links">
                                                Status <span class="text-primary"><?= $absens->status; ?></span>
                                                <div class="bullet"></div>
                                                <a href="#">Lihat</a>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#" class="font-weight-600"><img
                                                    src="assets/img/avatar/avatar-1.png" alt="avatar" width="30"
                                                    class="rounded-circle mr-1"> <?= $currentSiswa->nama; ?></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>