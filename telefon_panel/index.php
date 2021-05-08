<!DOCTYPE html>
<html lang="en">

<head>
    <!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veri Tabanı Telefon Bayi</title>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div id="auth">
    <div class="container">
        <div class="row h-100  " style="margin-top: 10%;">
            <div class="col-lg-12 col-12">
                <div id="auth-left">
                    <h1 class="auth-title">Giriş yap.</h1>
                    <p class="auth-subtitle mb-5">Kayıt sırasında girdiğiniz verilerinizle giriş yapın.</p>

                    <form action="PDO/pdo_giris.php" method="POST">
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input type="text" class="form-control form-control-xl" placeholder="Email" name="email">
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input type="password" class="form-control form-control-xl" placeholder="Şifre"  name="sifre">
                                <div class="form-control-icon">
                                    <i class="bi bi-shield-lock"></i>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5"  name="girisyap">Giriş yap</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Bir hesabın yok mu? <a href="register.php"
                                class="font-bold">Kayıt
                                ol</a>.</p>
                        <p><a class="font-bold" href="auth-forgot-password.html">Şifremi unuttum</a>.</p>
                    </div>
                </div>
            </div>
          
        </div>
    </div>
    </div>
</body>
</html>
<?php include_once("footer.php")?>