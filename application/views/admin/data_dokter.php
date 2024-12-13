<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Dokter - Admin Poliklinik BK</title>

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
                <h3>Admin - Data Dokter</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Tambah Data Dokter</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-vertical">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="first-name-icon">Nama</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Nama Dokter" id="namadokter"
                                                                    name="namadokter">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-person"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">

                                                        <div class="form-group has-icon-left">
                                                            <label for="email-id-icon">Alamat</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Alamat" id="alamatdokter"
                                                                    name="alamatdokter">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-house-fill"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="mobile-id-icon">No HP</label>
                                                            <div class="position-relative">
                                                                <input type="number" class="form-control"
                                                                    placeholder="08xxx" id="nohpdokter"
                                                                    name="nohpdokter">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-phone"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="mobile-id-icon">Tempat Poli</label>
                                                            <div class="position-relative">
                                                                <select class="form-control" id="poli-dropdown"
                                                                    name="idpoli">
                                                                    <option value="">Pilih Poli</option>
                                                                    <?php foreach($poli as $data_poli): ?>
                                                                    <option value="<?= $data_poli['id'] ?>">
                                                                        <?= $data_poli['nama_poli'] ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                                <div class="form-control-icon">
                                                                    <i class="fas fa-hospital"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-primary me-1 mb-1 submit_dokter">Submit</button>
                                                        <button type="reset"
                                                            class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">List Dokter</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <table class="table table-striped" id="table1">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Alamat</th>
                                                    <th>No HP</th>
                                                    <th>Tempat Poli</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i=1; foreach($dokter as $data_dokter){?>
                                                <tr>
                                                    <td><?=$i++;?></td>
                                                    <td><?=$data_dokter['nama']?></td>
                                                    <td><?=$data_dokter['alamat']?></td>
                                                    <td><?=$data_dokter['no_hp']?></td>
                                                    <td><?=$data_dokter['nama_poli']?></td>
                                                    <td><a href="#"
                                                            class="btn btn-sm btn-outline-success btnUpdateDokter"
                                                            data-bs-toggle="modal" data-bs-target="#updateDokterForm"
                                                            data-id='<?=$data_dokter['id']?>'>Update</a>
                                                        | <a href="#"
                                                            class="btn btn-sm btn-outline-danger btnDeleteDokter"
                                                            data-id='<?=$data_dokter['id']?>'>Delete</a>
                                                    </td>
                                                </tr>
                                                <?php }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div class="modal fade text-left" id="updateDokterForm" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">Update Data Dokter </h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form action="#">
                            <div class="modal-body">
                                <input type="hidden" name="iddokter">
                                <input type="hidden" name="iduser">
                                <label>Nama Dokter: </label>
                                <div class="form-group">
                                    <input type="text" placeholder="Nama Dokter" name="namaDokter" class="form-control">
                                </div>
                                <label>Alamat: </label>
                                <div class="form-group">
                                    <input type="text" placeholder="Alamat Dokter" name="alamatDokter"
                                        class="form-control">
                                </div>
                                <label>No HP: </label>
                                <div class="form-group">
                                    <input type="number" placeholder="Nomor HP" name="nohpDokter" class="form-control">
                                </div>
                                <label>Tempat Poli: </label>
                                <div class="form-group">
                                    <div class="position-relative">
                                        <select class="form-control" id="poli-dropdown" name="idPoli">
                                            <option value="">Pilih Poli</option>
                                            <?php foreach($poli as $data_poli): ?>
                                            <option value="<?= $data_poli['id'] ?>">
                                                <?= $data_poli['nama_poli'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Close</span>
                                </button>
                                <button type="button" class="btn btn-primary ml-1 submit_update"
                                    data-bs-dismiss="modal">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Update</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    $(document).ready(function() {

        $('.submit_dokter').click(function(event) {
            event.preventDefault();

            var dokter = $('[name=namadokter]').val();
            var alamat = $('[name=alamatdokter]').val();
            var nohp = $('[name=nohpdokter]').val();
            var poli = $('[name=idpoli]').val();

            if (dokter.length == 0 || alamat.length == 0 || nohp.length == 0 || poli.length == 0) {
                Swal.fire({
                    title: "Gagal!",
                    text: "Semua data wajib diisi!",
                    icon: "error"
                });
                return;
            }

            if (poli === '') {
                Swal.fire({
                    title: "Gagal!",
                    text: "Semua data wajib diisi!",
                    icon: "error"
                });
                return;
            }

            $.ajax({
                url: '<?=base_url("home/tambah_dokter")?>',
                type: 'post',
                data: {
                    namaDokter: dokter,
                    alamatDokter: alamat,
                    nohpDokter: nohp,
                    poliDokter: poli,
                },
                success: function(response) {
                    if (response.status === 'oke') {
                        Swal.fire({
                            title: "Berhasil!",
                            text: "Dokter telah ditambahkan.",
                            showConfirmButton: false,
                            icon: "success",
                            timer: 1500
                        }).then(() => {
                            location.reload();
                        });
                        return;
                    } else {
                        Swal.fire({
                            title: "Gagal!",
                            text: "Dokter gagal ditambahkan!",
                            icon: "error"
                        });
                        return;
                    }
                },
                error: function() {
                    Swal.fire({
                        title: "Gagal!",
                        text: "Terjadi kesalahan dalam melakukan tambah data dokter!",
                        icon: "error"
                    });
                    return;
                }
            });
        });

        $('.btnUpdateDokter').click(function(event) {
            event.preventDefault();

            var iddokter = $(this).data('id');

            $.ajax({
                url: '<?=base_url('home/ambil_data_dokter_by_id')?>',
                type: 'post',
                data: {
                    id: iddokter
                },
                dataType: 'json',
                success: function(data) {
                    if (data) {
                        $('#updateDokterForm input[name="iddokter"]').val(data.id);
                        $('#updateDokterForm input[name="iduser"]').val(data.id_user);
                        $('#updateDokterForm input[name="namaDokter"]').val(data.nama);
                        $('#updateDokterForm input[name="alamatDokter"]').val(data
                            .alamat);
                        $('#updateDokterForm input[name="nohpDokter"]').val(data.no_hp);
                        $('#updateDokterForm select[name="idPoli"]').val(data.id_poli);
                    } else {
                        alert('Data not found');
                    }
                },
                error: function() {
                    Swal.fire('Error', 'Terjadi kesalahan saat mengirim data', 'error');
                }
            });
        });

        $('.submit_update').click(function(event) {
            event.preventDefault();

            var iddokter = $('[name=iddokter]').val();
            var iduser = $('[name=iduser]').val();
            var namadokter = $('[name=namaDokter]').val();
            var alamatdokter = $('[name=alamatDokter]').val();
            var nohpdokter = $('[name=nohpDokter]').val();
            var idpoli = $('[name=idPoli]').val();

            if (namadokter.length == 0 || alamatdokter.length == 0 || nohpdokter.length == 0 || idpoli.length == 0) {
                Swal.fire({
                    title: "Gagal!",
                    text: "Semua data wajib diisi!",
                    icon: "error"
                });
                return;
            }

            $.ajax({
                url: '<?=base_url('home/update_dokter')?>',
                type: 'post',
                data: {
                    idDokter: iddokter,
                    idUser: iduser,
                    namaDokter: namadokter,
                    alamatDokter: alamatdokter,
                    nohpDokter: nohpdokter,
                    idPoli: idpoli,
                },
                success: function(response) {
                    if (response.status === 'oke') {
                        Swal.fire({
                            title: "Berhasil!",
                            text: "Dokter telah diupdate.",
                            showConfirmButton: false,
                            icon: "success",
                            timer: 1500
                        }).then(() => {
                            location.reload();
                        });
                        return;
                    } else {
                        Swal.fire({
                            title: "Gagal!",
                            text: "Dokter gagal diupdate.",
                            showConfirmButton: false,
                            icon: "error",
                            timer: 1500
                        }).then(() => {
                            location.reload();
                        });
                        return;
                    }
                },
                error: function() {
                    Swal.fire('Error', 'Terjadi kesalahan saat mengirim data', 'error');
                }
            });
        });

        $('.btnDeleteDokter').click(function(event) {
            event.preventDefault();

            var iddokter = $(this).data('id');
            var iduser = $(this).data('id_user');

            Swal.fire({
                title: "Anda yakin hapus data?",
                showCancelButton: true,
                confirmButtonText: "Yakin",
                confirmButtonColor: "#48c9b0",
                cancelButtonColor: "#ff0000",
                cancelButtonText: "Tidak",
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?=base_url("home/delete_dokter")?>',
                        type: 'post',
                        data: {
                            id: iddokter,
                            iduser: iduser
                        },
                        success: function(response) {
                            if (response.status === 'oke') {
                                Swal.fire({
                                    title: "Berhasil!",
                                    text: "Dokter telah dihapus.",
                                    showConfirmButton: false,
                                    icon: "success",
                                    timer: 1500
                                }).then(() => {
                                    location.reload();
                                });
                                return;
                            } else {
                                Swal.fire({
                                    title: "Gagal!",
                                    text: "Dokter gagal dihapus.",
                                    showConfirmButton: false,
                                    icon: "error",
                                    timer: 1500
                                }).then(() => {
                                    location.reload();
                                });
                                return;
                            }
                        },
                        error: function() {
                            Swal.fire('Error',
                                'Terjadi kesalahan saat mengirim data', 'error');
                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire("Changes are not saved", "", "info");
                }
            });
        });
    });
    </script>

</body>

</html>