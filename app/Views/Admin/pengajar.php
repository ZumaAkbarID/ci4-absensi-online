<?= $this->extend('admin/templates/layout'); ?>
<?= $this->section('content'); ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pengajar</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Data Pengajar</h2>
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Semua Pengajar</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>NIP</th>
                                            <th>Foto</th>
                                            <th>Nama</th>
                                            <th>Mapel</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $n = 1;
                                        foreach ($pengajar->findAll() as $pengajars) :
                                            $currentMapel =  $mapel->findAll();
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $n++; ?>
                                            </td>
                                            <td class="align-middle"><?= $pengajars->nip; ?></td>
                                            <td>
                                                <img alt="image"
                                                    src="<?= base_url(); ?>/data/img/avatar/pengajar/<?= $pengajars->avatar; ?>"
                                                    class="rounded" width="50" data-toggle="tooltip"
                                                    title="<?= $pengajars->nama; ?>">
                                            </td>
                                            <td>
                                                <?= $pengajars->nama; ?>
                                            </td>

                                            <td>
                                                <?php
                                                    foreach ($currentMapel as $cuM) {
                                                        if ($cuM->id_pengajar == $pengajars->id) {
                                                            echo $cuM->nama_mapel . ', ';
                                                        }
                                                    } ?>
                                            </td>
                                            <td>
                                                <?php if ($pengajars->status == 'Aktif') : ?>
                                                <div class="badge badge-success">Aktif</div>
                                                <?php elseif ($pengajars->status == 'Pensiun') : ?>
                                                <div class="badge badge-warning">Pensiun</div>
                                                <?php elseif ($pengajars->status == 'Nonaktif') : ?>
                                                <div class="badge badge-danger">Nonaktif</div>
                                                <?php endif; ?>
                                            </td>
                                            <td><button onclick="detailPengajar(<?= $pengajars->id; ?>)"
                                                    class="btn btn-secondary">Detail</button> | <a href="#"
                                                    class="btn btn-primary">Ubah</a>
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
        </div>
    </section>
</div>
<?= $this->endSection(); ?>