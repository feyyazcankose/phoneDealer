<?php 
session_start();
?>
<body>
<section class="menu">
<div class="container">
                <ul >
                        <li >
                            <a href="musteri-siparis-ver.php" class='aktif'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-phone" viewBox="0 0 16 16">
                            <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/>
                            <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                            </svg>
                                <span>Telefon Ürünleri</span>
                            </a>
                        </li>

                        <li >
                            <a href="musteri-gecmis-siparis.php" class='sidebar-link sidebar-hover'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                            </svg>
                                <span class="drop_after">Geçmiş Sparişler</span>
                                
                            </a>
                        </li>
                      
                        <li>
                            <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg></a>
                        </li>
                        <li >
                            <a href="#" class='sub' onclick="ShowAndHide('mbil-sub')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                            </svg>
                            </a>
                            <ul class="dropdown" id="mbil-sub" STYLE="display:none">
                                <li class="dropdown-child">
                                    <a href="musteri-profil-guncelle.php">Profil Bilgileri</a>
                                </li>
                                <li class="dropdown-child">
                                    <a href="musteri-sifre-degistir.php">Şifre Bilgisi</a>
                                </li>
                                <li class="dropdown-child">
                                    <a href="musteri-adres-guncelle.php">Adres Bilgileri</a>
                                </li>
                                <li class="dropdown-child" >
                                <a href="../cikis.php" class='sidebar-link sidebar-hover'>
                                    <span>Çıkış Yap</span>
                                 </a>
                                </li> 
                            </ul>
                        </li>


                       

                    </ul>
                </div>

</section>
               