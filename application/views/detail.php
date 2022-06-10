<?php

$baseUrl = base_url();
$baseAssetUrl = $baseUrl . "assets/";
$i1 = $baseAssetUrl."images/home/icon1.png";
$pg1 = $baseAssetUrl."images/wisata/".$g1;
$pg2 = $baseAssetUrl."images/wisata/".$g2;
$pg3 = $baseAssetUrl."images/wisata/".$g3;
$pg4 = $baseAssetUrl."images/wisata/".$g4;
// preout($g1);
// exit;
// $id = $data["kdwisata"];
// $wisata = $data["wisata"];
// $lokasi = $data["lokasi"];
// $ket1 = $data["ket1"];
// $ket2 = $data["ket2"];
// $image = $data["image"];
// $akses = $data["akses"];
// $waktu = $data["waktu"];
// $tiket = $data["tiket"];
// $kategori = $data["kategori"];
// $g1 = $data["g1"];
// $g2 = $data["g2"];
// $g3 = $data["g3"];
// $g4 = $data["g4"];

?>  
<section id="page-breadcrumb">
    <div class="vertical-center sun">
            <div class="container">
            <div class="row">
                <div class="action">
                    <div class="col-sm-12">
                        <h1 class="title"><b><?= $kategori ?></b></h1>
                        <p><?= $wisata ?>, Malang.</p>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</section>
    <!--/#page-breadcrumb-->

<section id="company-information" class="padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="<?= $baseAssetUrl."images/wisata/".$image ;?>" class='img-responsive' />
            </div>
            <div class="col-sm-6">
                <p><?= $ket1 ?></p>
                <p><?= $ket2 ?></p>
            </div>
        </div>
    </div>
</section>

<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
                <div class="single-service">
                    <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="300ms">
                        <img src="<?= $i1 ?>" alt="">
                    </div>
                    <h2><b>Lokasi</b></h2>
                    <p><?= $lokasi ?></p>
                </div>
            </div>
            <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
                <div class="single-service">
                    <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="600ms">
                        <img src="<?= $baseAssetUrl."images/home/icon2.png" ?>" alt="">
                    </div>
                    <h2><b>Akses</b></h2>
                    <p><?= $akses ?></p>
                </div>
            </div>
            <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="900ms">
                <div class="single-service">
                    <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="900ms">
                        <img src="<?= $baseAssetUrl."images/home/icon3.png" ?>" alt="">
                    </div>
                    <h2><b>Jam & Tiket </b></h2>
                    <p>Buka <?= $waktu ?>, setiap hari.<br>Dan tiket <?= $tiket ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/#services-->

<section id="team">
    <div class="container">
        <div class="row">
            <h1 class="title text-center wow fadeInDown" data-wow-duration="500ms" data-wow-delay="300ms"><b>Galeri</b></h1>
            <p class="text-center wow fadeInDown" data-wow-duration="400ms" data-wow-delay="400ms"> Kumpulan foto dari <?= $wisata ?></p>
            <div id="team-carousel" class="carousel slide wow fadeIn" data-ride="carousel" data-wow-duration="400ms" data-wow-delay="400ms">
                <!-- Indicators -->
                <ol class="carousel-indicators visible-xs">
                    <li data-target="#team-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#team-carousel" data-slide-to="1"></li>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="col-sm-3 col-xs-6">
                            <div class="team-single-wrapper">
                                <div class="team-single">
                                    <div class="person-thumb">
                                        <img src="<?= $pg1 ?>" class='img-responsive' /> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-6">
                            <div class="team-single-wrapper">
                                <div class="team-single">
                                    <div class="person-thumb">
                                        <img src="<?= $pg2 ?>" class="img-responsive" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-6">
                            <div class="team-single-wrapper">
                                <div class="team-single">
                                    <div class="person-thumb">
                                        <img src="<?= $pg3 ?>" class="img-responsive" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-6">
                            <div class="team-single-wrapper">
                                <div class="team-single">
                                    <div class="person-thumb">
                                        <img src="<?= $pg4 ?>" class="img-responsive" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>