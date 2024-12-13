<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Dashboard Poliklinik BK</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.css')?>">

    <link rel="stylesheet" href="<?=base_url('assets/vendors/iconly/bold.css')?>">

    <link rel="stylesheet" href="<?=base_url('assets/vendors/perfect-scrollbar/perfect-scrollbar.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/vendors/bootstrap-icons/bootstrap-icons.css')?>">
    <!-- Link CDN FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?=base_url('assets/css/app.css')?>">
    <link rel="shortcut icon" href="<?=base_url('assets/images/favicon.svg')?>" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="<?=base_url('assets/images/logo/logo.png')?>" alt="Logo"
                                    srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item active ">
                            <a href="<?=base_url('')?>" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-title">Manage Data</li>

                        <li class="sidebar-item  ">
                            <a href="<?=base_url('home/data_dokter')?>" class='sidebar-link'>
                                <i class="fas fa-user-doctor"></i>
                                <span>Dokter</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="<?=base_url('home/data_pasien')?>" class='sidebar-link'>
                                <i class="fas fa-wheelchair"></i>
                                <span>Pasien</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="<?=base_url('home/data_obat')?>" class='sidebar-link'>
                                <i class="fas fa-briefcase-medical"></i>
                                <span>Obat</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="<?=base_url('home/data_poli')?>" class='sidebar-link'>
                                <i class="fas fa-hospital"></i>
                                <span>Poli</span>
                            </a>
                        </li>

                        <li class="sidebar-title">Action</li>

                        <li class="sidebar-item  ">
                            <a href="<?=base_url('home/logout')?>" class='sidebar-link'>
                                <i class="fas fa-right-from-bracket"></i>
                                <span>Log Out</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Dashboard Admin</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="card">
                                    <div class="card-body py-4 px-5">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-xl">
                                                <img src="<?=base_url('assets/images/faces/1.jpg')?>" alt="Face 1">
                                            </div>
                                            <div class="ms-3 name">
                                                <h5 class="font-bold">Selamat datang,
                                                    <strong><?=$user['username']?></strong> !
                                                </h5>
                                                <h6 class="text-muted mb-0">Semoga harimu menyenangkan.</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <a href="<?=base_url('home/data_dokter')?>" class="card-link">
                                    <div class="card">
                                        <div class="card-body px-3 py-4-5">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="stats-icon purple">
                                                        <i class="fas fa-user-doctor"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <h6 class="text-muted font-semibold">Dokter</h6>
                                                    <h6 class="font-extrabold mb-0">112.000</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <a href="<?=base_url('home/data_pasien')?>" class="card-link">
                                    <div class="card">
                                        <div class="card-body px-3 py-4-5">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="stats-icon blue">
                                                        <i class="fas fa-wheelchair"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <h6 class="text-muted font-semibold">Pasien</h6>
                                                    <h6 class="font-extrabold mb-0">183.000</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <a href="<?=base_url('home/data_obat')?>" class="card-link">
                                    <div class="card">
                                        <div class="card-body px-3 py-4-5">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="stats-icon green">
                                                        <i class="fas fa-briefcase-medical"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <h6 class="text-muted font-semibold">Obat</h6>
                                                    <h6 class="font-extrabold mb-0">80.000</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <a href="<?=base_url('home/data_poli')?>" class="card-link">
                                    <div class="card">
                                        <div class="card-body px-3 py-4-5">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="stats-icon red">
                                                        <i class="fas fa-hospital"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <h6 class="text-muted font-semibold">Poli</h6>
                                                    <h6 class="font-extrabold mb-0">112</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2024 &copy; Poliklinik BK</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="<?=base_url('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')?>"></script>
    <script src="<?=base_url('assets/js/bootstrap.bundle.min.js')?>"></script>

    <script src="<?=base_url('assets/vendors/apexcharts/apexcharts.js')?>"></script>
    <script src="<?=base_url('assets/js/pages/dashboard.js')?>"></script>

    <script src="<?=base_url('assets/js/main.js')?>"></script>

</body>

</html>