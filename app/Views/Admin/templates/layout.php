<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $title; ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/modules/weather-icon/css/weather-icons.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/modules/weather-icon/css/weather-icons-wind.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/modules/summernote/summernote-bs4.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">

            <?= $this->include('templates/navbar'); ?>

            <?= $this->include('templates/sidebar'); ?>

            <?= $this->renderSection('content'); ?>

            <?= $this->include('templates/footer'); ?>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= base_url(); ?>/assets/modules/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/assets/modules/popper.js"></script>
    <script src="<?= base_url(); ?>/assets/modules/tooltip.js"></script>
    <script src="<?= base_url(); ?>/assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url(); ?>/assets/modules/moment.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="<?= base_url(); ?>/assets/modules/simple-weather/jquery.simpleWeather.min.js"></script>
    <script src="<?= base_url(); ?>/assets/modules/chart.min.js"></script>
    <script src="<?= base_url(); ?>/assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="<?= base_url(); ?>/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?= base_url(); ?>/assets/modules/summernote/summernote-bs4.js"></script>
    <script src="<?= base_url(); ?>/assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

    <!-- JS Libraies -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="<?= base_url(); ?>/assets/js/scripts.js"></script>
    <script src="<?= base_url(); ?>/assets/js/custom.js"></script>

    <!-- custom -->
    <script>
    function detailPengajar(id) {
        $.ajax({
            url: '<?= base_url() . '/admin/detailPengajar/'; ?>' + id,
            type: 'POST',
            dataType: 'JSON',
            success: function(data) {
                var txt;
                txt = '<ul class="text-left unlisted"><li>NIP : ' + data.nip + '</li><li>Nama : ' + data
                    .nama + '</li>' + '<li>Email : ' + data.email + '</li><li>TTL : ' + data.ttl + '</li>' +
                    '<li>Agama : ' + data.agama + '</li><li>Telp : ' + data.tlp + '</li>' +
                    '<li>Status : ' + data.status + '</li><li>Created_at : ' + data.created_at + '</li>' +
                    '<li>Updated_at : ' + data.updated_at + '</li>';
                Swal.fire({
                    title: data.id,
                    html: txt,
                    imageUrl: '<?= base_url(); ?>/data/img/avatar/pengajar/' + data.avatar,
                    imageWidth: 400,
                    imageHeight: 400,
                    imageAlt: data.nama,
                })
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
            }
        })
    }
    </script>

</body>

</html>