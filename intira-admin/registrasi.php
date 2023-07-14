<?php
include './head.php';
?>


<?php
    //$pesan = '';
    if (isset($_POST['kirim'])) {
        $user_nik = $_POST['user_nik'];
        $user_nama = $_POST['user_nama'];
        $user_password = $_POST['user_password'];
        
        $commando->userid = $_POST['user_id'];
        $commando->passid = $_POST['user_password'];
        
        $config = new Config();
        $db = $config->getConnection($db_name,$host);
        
        $commando = new Tbl_User($db);
        $cekUser = $commando->CekUser($db_name, $usernik);
        
        if (!$cekUser) {
            if($commando->InsertUser($db_name,$user_nik,$user_nama,$user_password)){
                echo "<script>alert('NIK berhasil disimpan')</script>";
                echo "<script>location.href='index.php'</script>";
            }
        } else {
            echo "<script>alert('NIK sudah pernah terdaftar')</script>";
                echo "<script>location.href='index.php'</script>";
        }
    }
?>

<body style="background-image: url('../assets/img/bg-02.jpg');">
    <section class="about_section layout_padding">
        <div class="container" style="background-color:white;background-color: rgba(255, 255, 255, .25)">
            <div class="sticky-container">
                <ul class="sticky">
                    <li>
                     <a href="index.php">
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
                     <a href="intira-admin">
                       <img src="../assets/img/icon_users.png" width="32" height="32">
                       <p>Login</p>
                     </a>  
                    </li>
                   </ul>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                  <div class="detail-box">
                    <div class="heading_container">
                      <h2>
                        Daftar
                      </h2>

                    </div>
                  </div>
                    <form class="form-horizontal"  method="POST"  data-parsley-validate="true" name="demo-form">
                    <table class="table table-hover">
                        <tr>
                            <td>
                                <label class="control-label col-md-4 col-sm-4">NIK</label>
                            </td>
                            <td>
                                <div class="col-md-12 col-sm-4">
                                    <input class="form-control" type="text" class="text" name="user_nik" id="user_nik">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="control-label col-md-4 col-sm-4">Nama</label>
                            </td>
                            <td>
                                <div class="col-md-12 col-sm-4">
                                    <input class="form-control" type="text" class="text" name="user_nama" id="user_nama">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="control-label col-md-4 col-sm-4">Password</label>
                            </td>
                            <td>
                                <div class="col-md-12 col-sm-4">
                                    <input class="form-control" type="text" class="text" name="user_password" id="user_password">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="control-label col-md-4 col-sm-4"></label>
                            </td>
                            <td>
                                <div class="col-md-12 col-sm-4">
                                        <button class="signin" name="kirim" id="kirim">
                                            Kirim
                                        </button>
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