<?php include_once("dbislemler/baglan.php");?>
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
        <div class="row h-100" style="margin-top: 3%;">
            <div class="col-lg-12 col-12">
                <div id="auth-left">
                    <h1 class="auth-title">Kayıt ol.</h1>
                    <p class="auth-subtitle mb-5">Web sitemize kaydolmak için verilerinizi girin.</p>

                    <form action="dbislemler/pdo_kayit.php" method="POST">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Adı" name="ad">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Soyadı" name="soyad">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                    
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Email" name="email">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                        
                        <div class="form-group position-relative has-icon-left mb-4">
                                    <select class="form-select form-control form-control-xl" aria-label=".form-select-lg example" name="yetki">
                                        <option selected value="1">Bayi</option>
                                        <option value="2">Müşteri</option>
                                    </select>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Şifre" name="sifre">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" name="kayitol">Kayıt ol</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Bir hesaba sahibim <a href="index.php"
                                class="font-bold">Giriş yap</a>.</p>
                    </div>
                </div>
            </div>
        </div>
        </div>


    </div>
</body>

</html>
<?php include_once("footer.php")?>