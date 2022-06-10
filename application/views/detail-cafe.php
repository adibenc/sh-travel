<?php

$baseUrl = base_url();
$baseAssetUrl = $baseUrl . "assets/";
$i1 = $baseAssetUrl."images/home/icon1.png";

$cafes = (array) $cafes;

function colCafe($data){?>
    <div class="col-sm-6 padding-right arrow-right wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms">
        <div class="single-blog timeline">
        <?php
        $data = (array) $data;
        $id = $data["kdcafe"];
        $nama = $data["nama"];
        $lokasi = $data["lokasi"];
        $ket = $data["ket"];
        $cover = $data["cover"];
        $kdkategori = $data["kdkategori"];
        $waktu = $data["waktu"];
        $tgl = $data["tgl"];
        ?> 
            <div class="single-blog-wrapper">
                <div class="post-thumb">
                    <img src="<?= base_url()."assets/" ?>images/wisata/<?= $cover ?>" class="img-responsive" />
                </div>
            </div>
            <div class="post-content overflow">
                <h2 class="post-title bold"><a><b><?= $nama ?></b></a></h2>
                <h3 class="post-author"><a>Posted by Vio</a></h3>
                <p><?= $ket ?></p>
                <b>Lokasi : </b><a class="read-more"><?= $lokasi ?></a>
                <div class="post-bottom overflow">
                    <span class="comments-number pull-right"><a><?= $tgl ?></a></span>
                </div>
            </div>
        </div>
    </div>
<?}
// exit;
?>  
<section id="page-breadcrumb">
    <div class="vertical-center sun">
            <div class="container">
            <div class="row">
                <div class="action">
                    <div class="col-sm-12">
                        <h1 class="title"><b>Nongkrong kuy</b></h1>
                        <p>Malang, Jawa Timur</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/#page-breadcrumb-->  
<section id="blog" class="padding-bottom">
    <div class="container">
        <div class="row">
            <div class="timeline-blog overflow padding-top">
                <div class="timeline-date text-center">
                    <a href="#" class="btn btn-common uppercase">CAFE</a>
                </div> 
                <div class="timeline-divider overflow padding-bottom">
                    <?php
                    colCafe($cafes[0]);
                    colCafe($cafes[1]);
                    ?>
                </div>
            </div>
                <div class="timeline-date text-center">
                    <a href="#" class="btn btn-common uppercase">CAFE</a>
                </div> 
                <div class="timeline-divider overflow padding-bottom">
                    <?php
                        colCafe($cafes[2]);
                        colCafe($cafes[3]);
                    ?>
                </div>
        </div>
    </div>
</section>