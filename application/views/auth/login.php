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
                    <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-5">Untuk menggunakan layanan kami, silakan log in terlebih dahulu.</p>

                    <form>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Username" name="nama">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Password"
                                name="alamat">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" id="tombolLoginUser">Log
                            in</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Pasien Baru? <a href="<?=base_url('home/daftar')?>"
                                class="font-bold">Daftar</a>.</p>
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

    $('#tombolLoginUser').click(function(event) {
        event.preventDefault();

        var nama = $('[name=nama]').val();
        var alamat = $('[name=alamat]').val();

        if (nama.length == 0 || alamat.length == 0) {
            Swal.fire({
                title: "Gagal!",
                text: "Username dan password wajib diisi!",
                icon: "error"
            });
            return;
        }

        $.ajax({
            url: '<?=base_url("home/proses_login")?>',
            type: 'post',
            data: {
                namaPasien: nama,
                alamatPasien: alamat,
            },
            success: function(response) {
                if (response.status === 'oke') {
                    Swal.fire({
                        title: "Berhasil!",
                        text: "Login berhasil! Mohon ditunggu",
                        showConfirmButton: false,
                        icon: "success",
                        timer: 1500
                    }).then(() => {
                        location.reload();
                    });
                    return;
                } else if (response.status === 'pass') {
                    Swal.fire({
                        title: "Gagal!",
                        text: "Password salah!",
                        icon: "error"
                    });
                    return;
                } else {
                    Swal.fire({
                        title: "Gagal!",
                        text: "Username tidak terdaftar!",
                        icon: "error"
                    });
                    return;
                }
            },
            error: function() {
                Swal.fire({
                    title: "Gagal!",
                    text: "Terjadi kesalahan dalam melakukan login!",
                    icon: "error"
                });
                return;
            }
        });
    });

});
</script>

</html>