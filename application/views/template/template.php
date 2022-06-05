<?php
$baseUrl = base_url();
$baseAssetUrl = $baseUrl . "assets/";
?>
<!--/#header-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Holiday | Vhio's Home</title>
    <link href="<?= $baseAssetUrl.'images/logo-2.png' ?>" rel="icon">
    <link href="<?= $baseAssetUrl.'css/bootstrap.min.css' ?>" rel="stylesheet">
    <link href="<?= $baseAssetUrl.'css/font-awesome.min.css' ?>" rel="stylesheet">
    <link href="<?= $baseAssetUrl.'css/animate.min.css' ?>" rel="stylesheet"> 
    <link href="<?= $baseAssetUrl.'css/lightbox.css' ?>" rel="stylesheet"> 
    <link href="<?= $baseAssetUrl.'css/main.css' ?>" rel="stylesheet">
    <link href="<?= $baseAssetUrl.'css/responsive.css' ?>" rel="stylesheet">

    <script>
        let gl = {
            baseurl: "<?= $baseUrl ?>"
        }
    </script>
</head><!--/head-->
<body>
    <header id="header">
        <div class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="index.php">
                        <h1><img src="<?= $baseAssetUrl.'images/logo.png' ?>" alt="logo"></h1>
                    </a>
                    
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?= $baseUrl ?>"><h5>Beranda</h5></a></li>
                        <li class="active" class="dropdown"><a href="#">
                            <h5>Wisata Alam<i class="fa fa-angle-down"></i></h5></a>
                            <ul role="menu" class="sub-menu">
                                <li class="active" ><a href="<?= $baseUrl."cat/gunung" ?>">Pendakian</a></li>
                                <li><a href="wisata_airterjun.php">Air Terjun</a></li>
                                <li><a href="<?= $baseUrl."cat/goa" ?>">Goa</a></li>
                                <li><a href="<?= $baseUrl."cat/pemandian" ?>">Pemandian</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a>
                            <h5>Wisata Edukasi <i class="fa fa-angle-down"></i></h5></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="<?= $baseUrl."cat/taman" ?>">Taman</a></li>
                                <li><a href="<?= $baseUrl."cat/candi" ?>">Candi</a></li>
                                <li><a href="<?= $baseUrl."cat/kampung" ?>">Kampung Wisata</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="<?= $baseUrl."cat/tongkrong" ?>"><h5>Tongkrongan</h5></a></li>
                        <li>
                        <!-- <a href="<?= $baseUrl."home/about" ?>"><h5>Tentang</h5></a></li> -->
                        <a href="<?= $baseUrl."home/recom" ?>"><h5>Rekomendasi</h5></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <?= $_content; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?= $baseAssetUrl."js/scripts.js" ?>"> </script>
    <script src="<?= $baseAssetUrl."js/ajaxer.js" ?>"> </script>
    <script type="text/javascript" src="<?= $baseAssetUrl."js/jquery.js"?>"></script>
    <script type="text/javascript" src="<?= $baseAssetUrl."js/bootstrap.min.js"?>"></script>
    <script type="text/javascript" src="<?= $baseAssetUrl."js/lightbox.min.js"?>"></script>
    <script type="text/javascript" src="<?= $baseAssetUrl."js/wow.min.js"?>"></script>
    <script type="text/javascript" src="<?= $baseAssetUrl."js/main.js"?>"></script>  
    <?= $_script ?>
    <!--/#team-->
</body>