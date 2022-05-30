<?php
$baseUrl = base_url();
$baseAssetUrl = $baseUrl . "assets/";
?>
<!DOCTYPE html>
<html>

<head>
    <link href="<?= base_url('assets/') ?>css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="icon" type="image/x-icon" href="<?=base_url()?>assets/img/icon.png" />
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.27.0/feather.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>js/jquery.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>js/scripts-admin.js"></script>
    <title>Informasi Perkara</title>

    <style type="text/css">
    .center {
  margin: auto;
  width: 50%;
  padding: 10px;
}
        .logo img {
            height: auto;
            float: left;
            width: 70px;
        }

        .front {
            text-shadow: 0 1px 0 #ccc, 0 1px 0 #c9c9c9;
            float: left;
            margin-top: 10px;
            padding: 2px;
            color: #fff;
            text-align: left;
            font-size: 20px;
        }

        .front span {
            margin-top: 10px;
            padding: 2px;
            color: #fff;
            font-size: 15px;
        }
    </style>
    <script>
        var baseUrl = "<?= base_url() ?>";
    </script>
</head>

<body class="">

    <main>
        <div class="bg-dark">
            <nav class="navbar navbar-marketing navbar-expand-lg bg-white navbar-light sticky-top">
                <div class="container ">
                    <div class="logo pt-2">
                        <img src="<?= base_url('assets/img/logo.png') ?>" width="100%">
                    </div>
                    <div class="front ml-2">
                        <h3 class="text-dark" style="margin-bottom: -0.5rem !important;">Informasi Perkara</h3>
                        <h1 class="font-weight-bold my-0 header-txt"><b>PIDANA UMUM</b></h1>

                    </div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto mr-lg-5">
                            <li class="nav-item"><a class="nav-link active" href="<?= site_url() ?>">Peta Kriminal </a></li>
                            <li class="nav-item"><a class="nav-link active" href="<?= site_url('info') ?>">Informasi perkara </a></li>
                            <li class="nav-item"><a class="nav-link active" href="<?= site_url('tahapan') ?>">Tahapan perkara </a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <?php echo $_content;?>
    </main>
    <footer class="footer mt-auto footer-light text-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 small">Copyright &copy; Kejaksaan Republik Indonesia. 2021</div>
            </div>
        </div>
    </footer>
</body>