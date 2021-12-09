<?= $this->extend('templates/layout'); ?>
<?= $this->section('content'); ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pengajar</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Data Pengajar</h2>

            <div class="card">
                <div class="card-header">
                    <h4>Semua Pengajar</h4>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>

                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input class="form-control" type="number" name="nip" id="nip" required
                                value="<?= $dataPengajar->nip; ?>">
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input class="form-control" type="text" name="nama" id="nama" required
                                value="<?= $dataPengajar->nama; ?>">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" type="email" name="email" id="email" required
                                value="<?= $dataPengajar->email; ?>">
                        </div>

                        <div class="form-group">
                            <label for="ttl">Tempat, Tanggal Lahir</label>
                            <input class="form-control" type="text" name="ttl" id="ttl" required
                                value="<?= $dataPengajar->ttl; ?>">
                        </div>

                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <input class="form-control" type="text" name="agama" id="agama" required
                                value="<?= $dataPengajar->agama; ?>">
                        </div>

                        <div class="form-group">
                            <label for="tlp">No. Telp (628xxx)</label>
                            <input class="form-control" type="number" name="tlp" id="tlp" required
                                value="<?= $dataPengajar->tlp; ?>">
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="Aktif">Aktif</option>
                                <option value="Pensiun">Pensiun</option>
                                <option value="Nonaktif">Nonaktif</option>
                            </select>
                        </div>

                        <div class="mb-0">
                            <div class="dropzone dropzone-single mb-3" data-toggle="dropzone"
                                data-dropzone-url="http://">
                                <div class="fallback">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="projectCoverUploads">
                                        <label class="custom-file-label" for="projectCoverUploads">Choose file</label>
                                    </div>
                                </div>
                                <div class="dz-preview dz-preview-single">
                                    <div class="dz-preview-cover">
                                        <img class="dz-preview-img" width="100%" src="..." alt="..." data-dz-thumbnail>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>