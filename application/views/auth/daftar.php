<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Poliklinik BK</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/vendors/bootstrap-icons/bootstrap-icons.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/app.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/pages/auth.css')?>">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><img src="<?=base_url('assets/images/logo/logo.png')?>" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Daftar Pasien</h1>
                    <p class="auth-subtitle mb-5">Mohon lengkapi data dengan benar.</p>

                    <form>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Nama Pasien"
                                name="nama">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Alamat" name="alamat">
                            <div class="form-control-icon">
                                <i class="bi bi-house-fill"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="number" class="form-control form-control-xl" placeholder="Nomor KTP"
                                name="ktp">
                            <div class="form-control-icon">
                                <i class="bi bi-card-checklist"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="number" class="form-control form-control-xl" placeholder="Nomor HP" name="hp">
                            <div class="form-control-icon">
                                <i class="bi bi-phone"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5"
                            id="tombolDaftarUser">Daftar</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Sudah pernah mendaftar? <a href="<?=base_url()?>" class="font-bold">Log
                                in</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function() {

    $('#tombolDaftarUser').click(function(event) {
        event.preventDefault();

        var nama = $('[name=nama]').val();
        var alamat = $('[name=alamat]').val();
        var ktp = $('[name=ktp]').val();
        var hp = $('[name=hp]').val();

        if (nama.length == 0 || alamat.length == 0 || ktp.length == 0 || hp.length == 0) {
            Swal.fire({
                title: "Gagal!",
                text: "Pastikan data sudah lengkap!",
                icon: "error"
            });
            return;
        }

        Swal.fire({
            title: "Apakah data sudah benar?",
            showCancelButton: true,
            confirmButtonText: "Sudah",
            confirmButtonColor: "#48c9b0",
            cancelButtonColor: "#ff0000",
            cancelButtonText: "Belum",
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?=base_url("home/proses_daftar")?>',
                    type: 'post',
                    data: {
                        namaPasien: nama,
                        alamatPasien: alamat,
                        ktpPasien: ktp,
                        hpPasien: hp
                    },
                    success: function(response) {
                        if (response.status === 'oke') {
                            Swal.fire({
                                title: "Berhasil!",
                                text: "Data pasien berhasil didaftarkan!",
                                icon: "success"
                            });
                            return;
                        } else {
                            Swal.fire({
                                title: "Gagal!",
                                text: "Nomor KTP telah terdaftar!",
                                icon: "error"
                            });
                            return;
                        }
                    },
                    error: function() {
                        Swal.fire({
                            title: "Gagal!",
                            text: "Terjadi kesalahan dalam melakukan pendaftaran!",
                            icon: "error"
                        });
                        return;
                    }
                });
            } else if (result.isDenied) {
                Swal.fire("Changes are not saved", "", "info");
            }
        });
    });

});
</script>

</html>