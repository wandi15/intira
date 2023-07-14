<?php
include './head.php';
include_once './includes/tbl_nasabah.inc';
?>
<body style="background-image: url('../assets/img/bg-02.jpg');"> 
  
    
    
  <section class="layout_padding">
    <div class="container" style="background-color:white;background-color: rgba(255, 255, 255, .25)">
        <div class="sticky-container">
            <ul class="sticky">
             <li>
              <a href="home.php">
                <img src="../assets/img/icon_home.png" width="32" height="32">
                <p>Home</p>
                </a>  
             </li>
             <li>
              <a href="informasi.php">
                <img src="../assets/img/icon_informasi.png" width="32" height="32">
                <p>Informasi</p>
              </a>  
             </li>
             <li>
              <a href="branch.php">
                <img src="../assets/img/icon_branch.png" width="32" height="32">
                <p>Branch</p>
              </a>  
             </li>
             <li>
              <a href="taksiran.php">
                <img src="../assets/img/icon_book.png" width="32" height="32">
                <p>Taksiran</p>
              </a>  
             </li>
             <li>
              <a href="elektonik-id.php">
                <img src="../assets/img/icon_card.png" width="32" height="32">
                <p>Kartu</p>
              </a>  
             </li>
             <li>
              <a href="../index.php">
                  <img src="../assets/img/icon_lock.png" width="32" height="32">
                <p>Keluar</p>
              </a>  
             </li>
            </ul>
        </div>
        
    <?php
        $config = new Config();
        $db = $config->getConnection($db_name,$host);
        
        $commando1 = new Tbl_User($db);
        $commando2 = new Tbl_Nasabah($db);
        
        $hasil1 = $commando1->CekUser($db_name, $_SESSION['user_nik']);
        $hasil2 = $commando2->CekNasabah($db_name, $_SESSION['user_nik']);
        
        if ($hasil1) {
            if ($hasil2) {
                foreach ($hasil2 as $value2) {
                    $nik = $value2->nasabah_nik;
                    $nama = $value2->nasabah_nama;
                    $tmpt_lahir = $value2->nasabah_tempat_lahir;
                    $tgl_lahir = $value2->nasabah_tgl_lahir;
                    $alamat_ktp = $value2->nasabah_alamat_ktp;
                    $alamat_domisili = $value2->nasabah_alamat_domisili;
                    $provinsi = $value2->nasabah_provinsi;
                    $kab_kota = $value2->nasabah_kab_kota;
                    $kecamatan = $value2->nasabah_kecamatan;
                    $kelurahan = $value2->nasabah_kelurahan;
                    $agama = $value2->nasabah_agama;
                    $pekerjaan = $value2->nasabah_pekerjaan;
                    $email = $value2->nasabah_email;
                    $nomor_hp = $value2->nasabah_nomor_hp;
                }
            } else {
                foreach ($hasil1 as $value1) {
                    $nik = $value1->user_nik;
                    $nama = $value1->user_nama;
                }
            }            
        }
        
        
        if (isset($_POST['upgrade'])) {
            echo "<script>location.href='elektonik-id_update.php'</script>";
        }
    ?>
    <div class="row">
          <div class="detail-box">
            <div class="heading_container">
                        <a href="admin.php">
                          <img src="../assets/img/icon_admin.png" width="32" height="32">
                        </a>
              <h2>
                Kartu
              </h2>
                <center>
                <div>
                        
                </div>
                </center>    
            </div>
            
        </div>            
            <table class="table table-hover">
                <tr>
                    <td style="text-align: center">
                        <img src="../assets/img/format_card.png" style="width: 400px">
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center">
                        <form class="form-horizontal" method="POST">
                            <button style="background-color: cyan" class="signin" name="upgrade" id="upgrade">Upgrade Kartu</button>
                        </form>    
                    </td>
                </tr>
            </table>
        
        <table class="table table-hover">
            <tr>
                <td>NIK</td>
                <td><?php echo $nik; ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><?php echo $nama; ?></td>
            </tr>
            <tr>
                <td>Tempat / Tanggal Lahir</td>
                <td><?php echo $tmpt_lahir.'/'.$tgl_lahir; ?></td>
            </tr>
            <tr>
                <td>Alamat Sesuai KTP</td>
                <td><?php echo $alamat_ktp; ?></td>
            </tr>
            <tr>
                <td>Alamat Sesuai Domisili</td>
                <td><?php echo $alamat_domisili; ?></td>
            </tr>
            <tr>
                <td>Provinsi</td>
                <td><?php echo $provinsi; ?></td>
            </tr>
            <tr>
                <td>Kab. / Kota</td>
                <td><?php echo $kab_kota; ?></td>
            </tr>
            <tr>
                <td>Kecamatan</td>
                <td><?php echo $kecamatan; ?></td>
            </tr>
            <tr>
                <td>Kelurahan</td>
                <td><?php echo $kelurahan; ?></td>
            </tr>
            <tr>
                <td>Agama</td>
                <td><?php echo $agama; ?></td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td><?php echo $pekerjaan; ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $email; ?></td>
            </tr>
            <tr>
                <td>No. HP</td>
                <td><?php echo $nomor_hp; ?></td>
            </tr>
        </table>
    </div>
  </section>

  <!-- end about section -->  
    <?php      
            //include './menu_xx.php'; 
    ?>
</body>

<?php

include './bottom.php';

?>