<?php 
session_start();
?>
<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                    <div class="row pro mt-4">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                            <div >
                                                <a href="../index.php"><img src="../img/4.jpg" alt="" style="width: 60px; height:60px; border-radius: 50px; margin-top: -20px;" class="avatar"></a>
                                            </div>
                                        <div class="ms-3 name">
                                            <div class="row">
                                            <h5> <span class="ince"><?php echo $_SESSION['ad']; ?></h5>
                                            </div>
                                            <div class="row">
                                            <h6>Yetki: Müşteri</h6>
                                            </div>
                                            <div class="row">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
                <hr style="color:#ffffffad">
                <!-- ./sidebar-header -->
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-item ">
                            <a href="musteri-siparis-ver.php" class='sidebar-link sidebar-hover'>
                                 <svg class="sidebar-hover" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket3-fill" viewBox="0 0 16 16">
                                    <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.468 15.426.943 9h14.114l-1.525 6.426a.75.75 0 0 1-.729.574H3.197a.75.75 0 0 1-.73-.574z"/>
                                  </svg>
                                <span>Spariş Ver</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="musteri-gecmis-siparis.php" class='sidebar-link sidebar-hover'>
                            <svg class="sidebar-hover" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-stack" viewBox="0 0 16 16">
                                    <path d="m14.12 10.163 1.715.858c.22.11.22.424 0 .534L8.267 15.34a.598.598 0 0 1-.534 0L.165 11.555a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.66zM7.733.063a.598.598 0 0 1 .534 0l7.568 3.784a.3.3 0 0 1 0 .535L8.267 8.165a.598.598 0 0 1-.534 0L.165 4.382a.299.299 0 0 1 0-.535L7.733.063z"/>
                                    <path d="m14.12 6.576 1.715.858c.22.11.22.424 0 .534l-7.568 3.784a.598.598 0 0 1-.534 0L.165 7.968a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.659z"/>
                                  </svg>
                                <span class="drop_after">Geçmiş Sparişler</span>
                                
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link sidebar-hover' onclick="ShowAndHide('mbil-sub')">
                            <svg class="sidebar-hover" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                    <path
                                        d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                                </svg>
                                <span>Bilgileri Güncelle</span>
                            </a>
                            <ul class="submenu " id="mbil-sub" STYLE="display:none">
                                <li class="submenu-item ">
                                    <a href="musteri-profil-guncelle.php">Profil Bilgileri</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="musteri-sifre-degistir.php">Şifre Bilgisi</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="musteri-adres-guncelle.php">Adres Bilgileri</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item">
                            <a href="../cikis.php" class='sidebar-link sidebar-hover'>
                            <svg class="sidebar-hover" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-unlock-fill" viewBox="0 0 16 16">
                                <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2z"/>
                                </svg>
                                <span>Çıkış Yap</span>
                            </a>
                        </li> 
                    </ul>
                </div>
            </div>
        </div>
    </div>