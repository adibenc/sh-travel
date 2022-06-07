<?php

$baseUrl = base_url();
$baseAssetUrl = $baseUrl . "assets/";
?>  
<section id="home-slider">
    <div class="container">
            <div class="main-slider">
                <div class="slide-text">
                    <h1><b>Hallo 💙</b></h1>
                    <p><h4>Disini adalah penyedia informasi tempat wisata di Kota Malang dari wisata alam, wisata buatan, wisata edukasi, tempat nongkrong asik milenial dan sebagainya.</h4></p>
                    <a href="<?= $baseUrl."home/about" ?>" class="btn btn-common">ABOUT</a>
                </div>
                <img src="<?= $baseAssetUrl."images/home/slider/hill.png" ?>" class="slider-hill" alt="slider image">
                <img src="<?= $baseAssetUrl."images/home/slider/house.png" ?>" class="slider-house" alt="slider image">
                <!-- <img src="<?= $baseAssetUrl."images/home/slider/sun.png" ?>" class="slider-sun" alt="slider image"> -->
                <img src="<?= $baseAssetUrl."images/home/slider/birds1.png" ?>" class="slider-birds1" alt="slider image">
                <img src="<?= $baseAssetUrl."images/home/slider/birds2.png" ?>" class="slider-birds2" alt="slider image">
            </div>
    </div>
    <div class="preloader"><i class="fa fa-sun-o fa-spin"></i></div>
</section>
<!--/#home-slider-->

<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
                <div class="single-service">
                    <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="300ms">
                        <img src="<?= $baseAssetUrl."images/home/icon11.png" ?>" alt="">
                    </div>
                    <h2><b>GUNUNG</b></h2>
                    <p>Malang memiliki beberapa dataran tinggi yang mungkin jarang di ketahui kalayak umum. Apa saja ya kira-kira? Mari kita ulas.</p>
                </div>
            </div>
            <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
                <div class="single-service">
                    <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="600ms">
                        <img src="<?= $baseAssetUrl."images/home/icon22.png" ?>" alt="">
                    </div>
                    <h2><b>EDUKASI</b></h2>
                    <p>Jalan-jalan dan bersenang-senang sambil menambah wawasan dan ilmu pengetahuan dengan wisata edukasi di Malang</p>
                </div>
            </div>
            <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="900ms">
                <div class="single-service">
                    <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="900ms">
                        <img src="<?= $baseAssetUrl."images/home/icon33.png" ?>" alt="">
                    </div>
                    <h2><b>TAMAN</b></h2>
                    <p>Menikmati suasana, berkumpul dengan teman atau pasangan, spot foto yang bagus pasti seru dan tentunya semua ada di Malang</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/#services-->

<section id="action" class="responsive">
    <div class="vertical-center">
            <div class="container">
            <div class="row">
                <div class="action take-tour">
                    <div class="col-sm-7 wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
                        <h1 class="title"><b>Cari Tongkrongan Asik??</b></h1>
                        <p>Jangan salah, di Malang banyak loh tempat asik buat kalian </p>
                        <p>nongkrong atau kumpul sama temen.</p><br>
                        <p>Langsung saja yuk meluncur. 🛵💨</p>
                    </div>
                    <div class="col-sm-5 text-center wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
                        <div class="tour-button">
                            <a href="wisata_tongkrongan.php" class="btn btn-common">TONGKRONGAN</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/#action-->

<section id="features">
    <div class="container">
        <div class="row">
            <div class="single-features">
                <div class="col-sm-5 wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
                    <img src="<?= $baseAssetUrl."images/home/mlg.jpg" ?>" class="img-responsive" alt="">
                </div>
                <div class="col-sm-6 wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
                    <h2><b>Malang</b></h2>
                    <P>Malang merupakan salah satu kota di Indonesia yang ramai dikunjungi. banyaknya destinasi wisata hingga tempat-tempat kuliner yang sangat terkenal. Menjadikan salah satu Kota terbesar di Jawa Timur ini dijuluki sebagai surga wisata.
                        Selain itu, di Kota Malang juga terdapat banyak perguruan tinggi yang terkenal hingga dunia Internasional. seperti Universitas Brawijaya, Universitas Negeri Malang, Universitas Muhammadiyah Malang, Universitas Islam Negeri Malang.
                        Banyak sekali para wisatawan asing yang berkunjung ke Kota Ini setiap harinya.</P>
                </div>
            </div>
            <div class="single-features">
                <div class="col-sm-6 col-sm-offset-1 align-right wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
                    <h2><b>Coban Rondo</b></h2>
                    <P>Air Terjun Coban Rondo merupakan salah satu air terjun yang ada di provinsi Jawa Timur, tepatnya di kecamatan Pujon Kabupaten Malang. Air terjun ini menjadi destinasi favorit banyak pengunjung karena menawarkan keindahan alam dan berbagai aktivitas menarik.
                        Udara sejuk ketinggian 1.135 mdpl ditambah derasnya air terjun menambah segar suasana sekitar kawasan Coban Rondo. Tinggi air terjun ini mencapai 84 meter dengan dengan debit air yang dapat melebihi 90 L per detik.</P>
                </div>
                <div class="col-sm-5 wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
                    <img src="<?= $baseAssetUrl."images/home/labirin.jpg" ?>" class="img-responsive" alt="">
                </div>
            </div>
            <div class="single-features">
                <div class="col-sm-5 wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
                    <img src="<?= $baseAssetUrl."images/home/bromo.jpg"?>" class="img-responsive" alt="">
                </div>
                <div class="col-sm-6 wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
                    <h2><b>Gunung Bromo</b></h2>
                    <P>Gunung Bromo adalah salah satu gunung api yang masih aktif di Indonesia. Gunung yang memiliki ketinggian 2.392 meter di atas permukaan laut ini merupakan destinasi andalan Jawa Timur. Gunung Bromo berdiri gagah dikelilingi kaldera atau lautan pasir seluas 10 kilometer persegi.
                        Wisatawan yang berkunjung ke Gunung Bromo akan disambut oleh pemandangan yang indah.
                        <br><br>
                        Salah satu hal yang terkenal dari Gunung Bromo adalah golden sunrise-nya, pasalnya, Gunung Bromo dinobatkan sebagai tempat yang menawarkan pemandangan matahari terbit terbaik di Pulau Jawa.
                        Sesaat setelah momen matahari terbit berakhir, wisatawan akan kembali disuguhkan pemandangan yang tak kalah indanya, yaitu pemandangan negeri di atas awan. </P>
                </div>
            </div>
        </div>
    </div>
</section>
    <!--/#features-->

<section id="clients">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="clients text-center wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">
                    <p><img src="<?= $baseAssetUrl."images/home/go.jpg" ?>" class="img-responsive" alt=""></p>
                    <h1 class="title"><b>VIO<br>Tour & Travel</b></h1>
                    <p>SKRIPSI<br>Dosen Pembimbing : Yunifa Miftachul Arif, M.T <br>Universitas Islam Negeri Malang</p>
                </div>
            </div>
        </div>
    </div>
    </section>
<!--/#clients-->