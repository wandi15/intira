<?php
    $user_nik = $_SESSION['user_nik'];
?>
<div id="wrapper">
        <div id="bg"></div>
        <div id="overlay"></div>
        <div id="main">

                <!-- Header -->
                        <header id="header">
                            <img src="../assets/img/LOGO INTIRA.png" alt="" style="width: 250px" />
                            <p style="color: yellow"><b><?php echo strtoupper("Selamat Datang ".$user_nik); ?></b></p>                           
                                <nav>
                                        <ul>
                                                <li><a href="home.php" class="fa fa-home"><span class="label">Home</span></a></li>
                                                <li><a href="informasi.php" class="fa fa-info"><span class="label">Informasi</span></a></li>
                                                <li><a href="branch.php" class="fa fa-building"><span class="label">Kantor</span></a></li>
                                                <li><a href="taksiran.php" class="fa fa-book"><span class="label">Taksiran</span></a></li>
                                                <li><a href="elektonik-id.php" class="fa fa-address-card"><span class="label">Kartu</span></a></li>
                                                <li><a href="../index.php" class="fa fa-lock"><span class="label">Log Out</span></a></li>
                                        </ul>
                                </nav>
                        </header>

                <!-- Footer -->
                        <footer id="footer">
                                <span class="copyright">&copy; @IT-INTIRA </span>
                        </footer>

        </div>
</div>