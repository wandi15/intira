<?php
include './head.php';
include_once './includes/tbl_nasabah.inc';
?>
<body style="background-image: url('../assets/img/bg-02.jpg');">
    <section class="about_section layout_padding">
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
                <div class="col-md-12">
                  <div class="detail-box">
                    <div class="heading_container">
                      <h2>
                        Upgrade Kartu
                      </h2>

                    </div>
                  </div>
                    <form class="form-horizontal"  method="POST"  data-parsley-validate="true" name="demo-form">
                    <table class="table table-hover">
                        <tr>
                            <td>
                                <label class="control-label col-md-4 col-sm-4">Refferal</label>
                            </td>
                            <td>
                                <div class="col-md-12 col-sm-4">
                                    <input class="form-control" type="text" class="text" name="nasabah_refferal" id="nasabah_refferal" >
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="control-label col-md-4 col-sm-4">NIK</label>
                            </td>
                            <td>
                                <div class="col-md-12 col-sm-4">
                                    <input class="form-control" type="text" class="text" name="nasabah_nik" id="nasabah_nik" value="<?php echo $nik ?>" readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="control-label col-md-4 col-sm-4">Nama</label>
                            </td>
                            <td>
                                <div class="col-md-12 col-sm-4">
                                    <input class="form-control" type="text" class="text" name="nasabah_nama" id="nasabah_nama" value="<?php echo $nama ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="control-label col-md-4 col-sm-4">Nomor HP</label>
                            </td>
                            <td>
                                <div class="col-md-12 col-sm-4">
                                    <input class="form-control" type="text" class="text" name="nasabah_tlpn" id="nasabah_tlpn" value="<?php echo $nomor_hp ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="control-label col-md-4 col-sm-4">Email</label>
                            </td>
                            <td>
                                <div class="col-md-12 col-sm-4">
                                    <input class="form-control" type="text" class="text" name="nasabah_email" id="nasabah_email" value="<?php echo $email ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="control-label col-md-4 col-sm-4">Tempat Lahir</label>
                            </td>
                            <td>
                                <div class="col-md-12 col-sm-4">
                                    <input class="form-control" type="text" class="text" name="nasabah_tempat_lahir" id="nasabah_tempat_lahir" value="<?php echo $tmpt_lahir ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="control-label col-md-4 col-sm-4">Tanggal Lahir</label>
                            </td>
                            <td>
                                <div class="col-md-12 col-sm-4">
                                    <input class="form-control" type="text" class="text" name="nasabah_tgl_lahir" id="nasabah_tgl_lahir" value="<?php echo $tgl_lahir ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="control-label col-md-4 col-sm-4">Alamat KTP</label>
                            </td>
                            <td>
                                <div class="col-md-12 col-sm-4">
                                    <input class="form-control" type="text" class="text" name="nasabah_alamat_ktp" id="nasabah_alamat_ktp" value="<?php echo $alamat_ktp ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="control-label col-md-4 col-sm-4">Alamat Domisili</label>
                            </td>
                            <td>
                                <div class="col-md-12 col-sm-4">
                                    <input class="form-control" type="text" class="text" name="nasabah_alamat_domisili" id="nasabah_alamat_domisili" value="<?php echo $alamat_domisili ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="control-label col-md-4 col-sm-4">Provinsi</label>
                            </td>
                            <td>
                                <div class="col-md-12 col-sm-4">
                                    <input class="form-control" type="text" class="text" name="nasabah_provinsi" id="nasabah_provinsi" value="<?php echo $provinsi ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="control-label col-md-4 col-sm-4">Kab/Kota</label>
                            </td>
                            <td>
                                <div class="col-md-12 col-sm-4">
                                    <input class="form-control" type="text" class="text" name="nasabah_kab_kota" id="nasabah_kab_kota" value="<?php echo $kab_kota ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="control-label col-md-4 col-sm-4">Kecamatan</label>
                            </td>
                            <td>
                                <div class="col-md-12 col-sm-4">
                                    <input class="form-control" type="text" class="text" name="nasabah_kecamatan" id="nasabah_kecamatan" value="<?php echo $kecamatan ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="control-label col-md-4 col-sm-4">Kelurahan</label>
                            </td>
                            <td>
                                <div class="col-md-12 col-sm-4">
                                    <input class="form-control" type="text" class="text" name="nasabah_kelurahan" id="nasabah_kelurahan" value="<?php echo $kelurahan ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="control-label col-md-4 col-sm-4">Agama</label>
                            </td>
                            <td>
                                <div class="col-md-12 col-sm-4">
                                    <input class="form-control" type="text" class="text" name="nasabah_agama" id="nasabah_agama" value="<?php echo $agama ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="control-label col-md-4 col-sm-4">Pekerjaan</label>
                            </td>
                            <td>
                                <div class="col-md-12 col-sm-4">
                                    <input class="form-control" type="text" class="text" name="nasabah_pekerjaan" id="nasabah_pekerjaan" value="<?php echo $pekerjaan ?>">
                                </div>
                            </td>
                        </tr>
                    </table>
                    
                            
                            

                    </form>
                </div>
                        
            </div>
        </div>
    </section>
</body>