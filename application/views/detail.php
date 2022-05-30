<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Info Perkara</title>
    <link href="<?=base_url('assets/')?>css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script data-search-pseudo-elements defer
        src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.27.0/feather.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="">
    <nav class="topnav navbar navbar-expand shadow navbar-light bg-white" id="sidenavAccordion">
        <a class="mx-5" href="<?= site_url();?>">
            <img src="<?=base_url('assets/assets/img/logo.png')?>" alt="" width="150px">
        </a>
        <h3>{Kejaksaan Negeri XYZ} </h3>
        <ul class="navbar-nav align-items-center ml-auto">
            <li class="nav-item dropdown no-caret mr-3 d-none d-md-inline">

                <!-- <a href="#" class="mr-5" target="blank">Go to Application</a> -->
                <a href="#" class="btn btn-sm btn-danger rounded-pill font-weight-bold text-white px-3">Download</a>
            </li>
            <li class="nav-item dropdown no-caret mr-3 d-md-none">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="searchDropdown" href="#" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="search"></i></a>
                <!-- Dropdown - Search-->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--fade-in-up"
                    aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100">
                        <div class="input-group input-group-joined input-group-solid">
                            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search"
                                aria-describedby="basic-addon2" />
                            <div class="input-group-append">
                                <div class="input-group-text"><i data-feather="search"></i></div>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

        </ul>
    </nav>
    <main>
        <nav class="navbar navbar-expand-lg navbar-dark bg-danger small text-center"
            style="padding: 0 1rem !important;">
            <button class="navbar-toggler text-white btn btn-sm" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><i data-feather="menu"></i> Menu</button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link text-white bg-warning" data-id="home"
                            href="https://tppo.net/home"><svg class="svg-inline--fa fa-home fa-w-18" aria-hidden="true"
                                focusable="false" data-prefix="fas" data-icon="home" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z">
                                </path>
                            </svg><!-- <i class="fas fa-home"></i> --> </a></li>
                    <li class="nav-item"><a class="nav-link text-white" data-id="berita"
                            href="https://tppo.net/page/berita">Orang dan Harta Benda </a></li>
                    <li class="nav-item"><a class="nav-link text-white" data-id="berita"
                            href="https://tppo.net/page/berita">Kamnegtibum dan TPUL </a></li>
                    <li class="nav-item"><a class="nav-link text-white" data-id="berita"
                            href="https://tppo.net/page/berita">Narkotika dan Zat Adiktif Lainnya </a></li>
                    <li class="nav-item"><a class="nav-link text-white" data-id="berita"
                            href="https://tppo.net/page/berita">Terorisme dan Lintas Negara </a></li>
                </ul>

            </div>
        </nav>

        <!-- Main page content-->
        <div class="mx-2 mt-2">
            <div class="card mb-4">
                <div class="card-header text-dark">Detail Perkara</div>
                <div class="card-body">
                    <table class="table table-bordered table-sm">
                        <tr class="bg-danger text-white text-center">
                            <th>Nama Tersangka</th>
                            <th>Asal Penyidik</th>
                            <th>Pasal</th>
                            <th>Status</th>
                        </tr>
                        <tr>
                            <td>{Nama}, dkk</td>
                            <td>{Penyidik}</td>
                            <td>{Pasal}</td>
                            <td>{Status}</td>
                        </tr>
                    </table>

                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-item nav-link active" id="home-tab" data-toggle="tab"
                                        href="#home" role="tab" aria-controls="home" aria-selected="true">Data SPDP</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-item nav-link" id="profile-tab" data-toggle="tab"
                                        href="#profile" role="tab" aria-controls="profile" aria-selected="false">Data
                                        Berkas (Tahap-1)</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-item nav-link" id="profile-tab" data-toggle="tab"
                                        href="#tab_tahap_2" role="tab" aria-controls="profile"
                                        aria-selected="false">Data Penyerahan Tersangka dan Barang Bukti (Tahap-2)</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-item nav-link" id="settings-tab" data-toggle="tab"
                                        href="#tab_pelimpahan" role="tab" aria-controls="settings" aria-selected="false">Data
                                        Pelimpahan</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <table class="table table-striped mt-2">
                                        <tr>
                                            <td width="20%">No, tgl SPDP</td>
                                            <td width="80%">: {no_spdp}, {tgl_spdp}</td>
                                        </tr>
                                        <tr>
                                            <td>Asal Penyidik</td>
                                            <td>: {penyidik}</td>
                                        </tr>
                                        <tr>
                                            <td>Pasal yang disangkakan</td>
                                            <td>: {pasal}</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal terima SPDP</td>
                                            <td>: {tgl_terima_spdp}</td>
                                        </tr>
                                        <tr>
                                            <td>Jaksa Peneliti (P-16)</td>
                                            <td>: {jaksa_peneliti}</td>
                                        </tr>
                                        <tr>
                                            <td>Data Tersangka</td>
                                            <td>
                                                <table class="table table-sm">
                                                    <tr class="text-center">
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>Usia</th>
                                                        <th>#</th>
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>{nama_tsk}</td>
                                                        <td>{usia}</td>
                                                        <td class="text-center">
                                                            <button class="btn btn-sm btn-danger detail_tsk">Biodata</button>
                                                            <button class="btn btn-sm btn-danger detail_penahanan">Penahanan</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>{nama_tsk}</td>
                                                        <td>{usia}</td>
                                                        <td class="text-center">
                                                            <button class="btn btn-sm btn-danger">Biodata</button>
                                                            <button class="btn btn-sm btn-danger">Penahanan</button>
                                                        </td>
                                                    </tr>
                                                </table>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No, tgl P-17</td>
                                            <td>: {no_p17}, {tgl_p17} <br>
                                                <small>Pemberitahuan kepada Penyidik untuk segera mengirimkan
                                                    Berkas</small>

                                            </td>
                                        </tr>

                                    </table>

                                </div>
                                <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <table class="table table-striped mt-2">
                                        <tr>
                                            <td width="20%">No, tgl Berkas</td>
                                            <td width="80%">: {no_spdp}, {tgl_spdp}</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal terima Berkas</td>
                                            <td>: {tgl_terima_spdp}</td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Penelitian Berkas</td>
                                            <td>
                                                <table class="table table-sm">
                                                    <tr class="text-center">
                                                        <th>No</th>
                                                        <th>Pengembalian Ke-</th>
                                                        <th>No, tgl P-19</th>

                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>P-19 ke-1</td>
                                                        <td>{no_p19}, {tgl_p19}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>P-19 ke-2</td>
                                                        <td>{no_p19}, {tgl_p19}</td>
                                                    </tr>
                                                </table>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No, tgl P-21</td>
                                            <td>: {no_p21}, {tgl_p21} <br>
                                                <small>Pemberitahuan kepada Penyidik berkas Sudah Lengkap</small>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No, tgl P-21a</td>
                                            <td>: {no_p21a}, {tgl_p21a} <br>
                                                <small>Pemberitahuan kepada Penyidik untuk segera menyerahkan Tersangka
                                                    dan Barang Bukti</small>

                                            </td>
                                        </tr>

                                    </table>
                                </div>
                                <div class="tab-pane" id="tab_tahap_2" role="tabpanel" aria-labelledby="settings-tab">
                                    <table class="table table-striped mt-2">
                                        <tr>
                                            <td width="20%">No, tgl Tahap 2</td>
                                            <td width="80%">: {no_tahap_2}, {tgl_tahaP-2}</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal terima Tersangka dan BB</td>
                                            <td>: {tgl_terima_tahap_2}</td>
                                        </tr>
                                        <tr>
                                            <td>Jaksa Penuntut Umum (P-16a)</td>
                                            <td>: {jaksa_peneliti}</td>
                                        </tr>
                                        <tr>
                                            <td>Barang Bukti</td>
                                            <td>
                                                <table class="table table-sm">
                                                    <tr class="text-center">
                                                        <th>No</th>
                                                        <th>Barang Bukti</th>

                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>{bb_1}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>{bb_2}</td>
                                                    </tr>
                                                </table>

                                            </td>
                                        </tr>

                                    </table>
                                </div>
                                <div class="tab-pane" id="tab_pelimpahan" role="tabpanel" aria-labelledby="settings-tab">
                                    <table class="table table-striped mt-2">
                                        <tr>
                                            <td width="20%">No, tgl P-31</td>
                                            <td width="80%">: {no_p31}, {tgl_p31}</td>
                                        </tr>
                                        <tr>
                                            <td>Dakwaan</td>
                                            <td>: {isi_dakwaan}</td>
                                        </tr>
                                        <tr>
                                            <td>Link SIPP</td>
                                            <td>: {link_sipp_pn}</td>
                                        </tr>
                                        

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Third party docs message-->

        </div>
    </main>
    <footer class="footer mt-auto footer-light">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 small">Copyright &copy; Your Website 2020</div>
                <div class="col-md-6 text-md-right small">
                    <a href="#!">Privacy Policy</a>
                    &middot;
                    <a href="#!">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="<?=base_url('assets/')?>js/scripts.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

</body>

</html>

<script>
$(document).ready(function() {

    $('#dataTable').DataTable();

    $('body').on('click', ".detail_tsk", function() {
        $('#modal_tsk').modal("show");
    });

    $('body').on('click', ".detail_penahanan", function() {
        $('#modal_penahanan').modal("show");
    });

});
</script>

<div class="modal fade" id="modal_tsk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title no_laporan">Data Tersangka</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Nama : <br>
                Usia : <br>
                Alamat : <br>
                Tempat, tanggal lahir : <br>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_penahanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title no_laporan">Data Penahanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <td>No</td>
                        <td>No, tgl surat</td>
                        <td>Pejabat</td>
                        <td>Masa penahanan</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>No</td>
                        <td>{No, tgl surat}</td>
                        <td>Penyidik</td>
                        <td>15 hari</td>
                    </tr>
                    <tr>
                        <td>No</td>
                        <td>{No, tgl surat}</td>
                        <td>Penuntut Umum</td>
                        <td>30 hari</td>
                    </tr>
                    <tr>
                        <td>No</td>
                        <td>{No, tgl surat}</td>
                        <td>Hakim</td>
                        <td>15 hari</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>