<?= $this->extend('admin/templates/layout'); ?>
<?= $this->section('content'); ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Siswa</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Data Siswa</h2>
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Semua Siswa</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>NIS</th>
                                            <th>Foto</th>
                                            <th>Nama</th>
                                            <th>Kelas & Jurusan</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $n = 1;
                                        foreach ($siswa->findAll() as $siswa) :
                                            $currentKelas =  $kelas->where('id', $siswa->id_kelas)->first();
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $n++; ?>
                                            </td>
                                            <td class="align-middle"><?= $siswa->nis; ?></td>
                                            <td>
                                                <img alt="image"
                                                    src="<?= base_url(); ?>/data/img/avatar/siswa/<?= $siswa->avatar; ?>"
                                                    class="rounded" width="50" data-toggle="tooltip"
                                                    title="<?= $siswa->nama; ?>">
                                            </td>
                                            <td>
                                                <?= $siswa->nama; ?>
                                            </td>

                                            <td>
                                                <?php
                                                    if ($currentKelas == null) {
                                                        echo 'Tidak memiliki kelas';
                                                    } else {
                                                        echo $currentKelas->jurusan;
                                                    }
                                                    ?>
                                            </td>
                                            <td>
                                                <?php if ($siswa->status == 'Aktif') : ?>
                                                <div class="badge badge-success">Aktif</div>
                                                <?php elseif ($siswa->status == 'Keluar') : ?>
                                                <div class="badge badge-warning">Pensiun</div>
                                                <?php elseif ($siswa->status == 'Dikeluarkan') : ?>
                                                <div class="badge badge-danger">Nonaktif</div>
                                                <?php elseif ($siswa->status == 'Lulus') : ?>
                                                <div class="badge badge-primary">Nonaktif</div>
                                                <?php endif; ?>
                                            </td>
                                            <td><button onclick="detailSiswa(<?= $siswa->id; ?>)"
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