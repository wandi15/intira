<?php
ob_start();
include_once '../../config/global.php';
include_once 'vendor/autoload.php';
include_once 'config/config.php';
include_once 'vendor/wixel/gump/gump.class.php';


if(!isset($_SESSION['user_id'])){
  session_destroy();
  echo "<script>location.href='logout.php'</script>";
}
else {

            $comi = "";
            if (isset($_GET['comi'])) {
            $comi = (int) $_GET['comi'];
            }


            $config = new Config();
            $db = $config->getConnection($db_name,$host);
            
           

            $commando = new Aser($db);
           
            $ketemu = null;
            $hasil = null;
            $addstring = null;



            //check hak akses dulu yaaa...
            //inisial module
            //----------------------------
            //$aktifmodul = "8";
            //----------------------------



           // $admin = $commando->OPApaBukan($db_name,$_SESSION['id_pns'],$aktifmodul);

            //if (!empty($admin)) {
               //status benar admin
            //}
           // else {
              //status bukan admin
            //  die();

           // }


            //tampilkan jabatan
            $jab = $commando->TampilJab($db_name);
            //tampilkan agen
            $agen = $commando->TampilAgen($db_name);
            //tampilkan Bank Sub
            $subbank = $commando->TampilSubBank($db_name);
            $subbankUUS = $commando->TampilSubBankSyariah($db_name);


            $hasil = $commando->TampilUser($db_name);
            
            if(!empty($hasil)){
                  
                  $ketemu = "ya";
                  


              } else {
                  //jika tidak ditemukan datapegawainya, paksa keluar
                  $ketemu = "tidak";
              }
        
       
 }


 //post disini

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['cancelcomi'])) {
         echo "<script>location.href='template.php?module=adminuser'</script>";
    }

    
    if (isset($_POST['addcomi'])) {

      $config = new Config();
      $db = $config->getConnection($db_name,$host);
      $commando = new Aser($db);

      $pieces = explode("|", (string) $_POST["jab"]);
      $idjab = $pieces[0]; 
      $nmjab = $pieces[1];
      
      if ($_POST['level'] == 'Bank') {
            $pieces3 = explode("|", (string) $_POST["subbank"]);
            $idsubbank = $pieces3[0]; 
            $nmsubank = $pieces3[1];
      } elseif ($_POST['level'] == 'Bank Syariah') {
            $pieces3 = explode("|", (string) $_POST["subbankuus"]);
            $idsubbank = $pieces3[0]; 
            $nmsubank = $pieces3[1];
      }
      

      $pieces2 = explode("|", (string) $_POST["agen"]);
      $idagen = $pieces2[0]; 
      $nmagen = $pieces2[1];

      $fileada = "tdk";

      //check dulu loginnya jika ada tolak
      //--------------------------------------
      $checklogin = $commando->PeriksaLogin($db_name,$_POST['login']);

      if ($checklogin) {
        //jika ditemukan
        //maka berarti 
        //login sudah ada , gagalkan
        echo "<script>alert('user login sudah ada, gunakan yang lain')</script>";
        echo "<script>location.href='template.php?module=adminuser'</script>";
      }


      //---------------------------------------

      //check file tanda tangan yang di upload
      //----------------------------------------
      if (!empty($_FILES['pic'])) {
        
             $nilacak = rand(1000,100000);
             $pic = $nilacak."-".$_FILES['pic']['name'];
             $pic = preg_replace('/\s+/', '', $pic);
             $pic_loc = $_FILES['pic']['tmp_name'];
             
             $folder = "pic/";

                   
        if(move_uploaded_file($pic_loc,$folder.$pic))
              {

                    $fileada = "ya";
                    $commando->file_nama = $pic;
                    $commando->file_path = $folder;
              }  
      }

      //----------------------------------------
      if ($_POST['level'] == 'Admin' || $_POST['level'] == 'Operator') {
          
          if ($_POST["jab"] <> '') {
            //var_dump($_POST["jab"]);
            if($commando->InsertUser($db_name,$_POST['login'],$_POST['nama'],$_POST['passw'],$_POST['email'],$_POST['level'],
                    $idjab,$nmjab,
                    $idsubbank,$nmsubank,
                    $_POST['sebagai'],$idagen,$nmagen,
                    $fileada)) {
              //   include "pesansukses.php";
               echo "<script>alert('simpan sukses')</script>";
               echo "<script>location.href='template.php?module=adminuser'</script>";
            } else {
                  //   include "pesangagal.php";
                       echo "<script>alert('simpan gagal')</script>";
                       echo "<script>location.href='template.php?module=adminuser'</script>";
            }
         } else {
            echo "<script>alert('Simpan Gagal, Jabatan Harus Dipilih!')</script>";
            echo "<script>location.href='template.php?module=adminuser'</script>";
         }
      } elseif ($_POST['level'] == 'Bank') {
         if ($_POST["subbank"] <> '') {
            //var_dump($_POST["jab"]);
            if($commando->InsertUser($db_name,$_POST['login'],$_POST['nama'],$_POST['passw'],$_POST['email'],$_POST['level'],
                    $idjab,$nmjab,
                    $idsubbank,$nmsubank,
                    $_POST['sebagai'],$idagen,$nmagen,
                    $fileada)) {
              //   include "pesansukses.php";
               echo "<script>alert('simpan sukses')</script>";
               echo "<script>location.href='template.php?module=adminuser'</script>";
            } else {
                  //   include "pesangagal.php";
                       echo "<script>alert('simpan gagal')</script>";
                       echo "<script>location.href='template.php?module=adminuser'</script>";
            }
         } else {
            echo "<script>alert('Simpan Gagal, Sub. Bank Harus Dipilih!')</script>";
            echo "<script>location.href='template.php?module=adminuser'</script>";
         }
      } elseif ($_POST['level'] == 'Bank Syariah') {
         
         if ($_POST["subbankuus"] <> '') {
            if($commando->InsertUser($db_name,$_POST['login'],$_POST['nama'],$_POST['passw'],$_POST['email'],$_POST['level'],
                    $idjab,$nmjab,
                    $idsubbank,$nmsubank,
                    $_POST['sebagai'],$idagen,$nmagen,
                    $fileada)) {
              //   include "pesansukses.php";
               echo "<script>alert('simpan sukses')</script>";
               echo "<script>location.href='template.php?module=adminuser'</script>";
            } else {
                  //   include "pesangagal.php";
                       echo "<script>alert('simpan gagal')</script>";
                       echo "<script>location.href='template.php?module=adminuser'</script>";
            }
         } else {
            echo "<script>alert('Simpan Gagal, Sub. Bank Syairah Harus Dipilih!')</script>";
            echo "<script>location.href='template.php?module=adminuser'</script>";
         }
      } elseif ($_POST['level'] == 'Agen') {
         if ($_POST["agen"] <> '') {
            //var_dump($_POST["jab"]);
            if($commando->InsertUser($db_name,$_POST['login'],$_POST['nama'],$_POST['passw'],$_POST['email'],$_POST['level'],
                    $idjab,$nmjab,
                    $idsubbank,$nmsubank,
                    $_POST['sebagai'],$idagen,$nmagen,
                    $fileada)) {
              //   include "pesansukses.php";
               echo "<script>alert('simpan sukses')</script>";
               echo "<script>location.href='template.php?module=adminuser'</script>";
            } else {
                  //   include "pesangagal.php";
                       echo "<script>alert('simpan gagal')</script>";
                       echo "<script>location.href='template.php?module=adminuser'</script>";
            }
         } else {
            echo "<script>alert('Simpan Gagal, Agen Harus Dipilih!')</script>";
            echo "<script>location.href='template.php?module=adminuser'</script>";
         } 
      }
      
       
       
       
       


    }

     
   
    if (isset($_POST['editcomi'])) {

           $config = new Config();
           $db = $config->getConnection($db_name,$host);
           $commando = new Aser($db);

           $pieces = explode("|", (string) $_POST["jab"]);
           $idjab = $pieces[0]; 
           $nmjab = $pieces[1];
           
           if ($_POST['level'] == 'Bank') {
                $pieces3 = explode("|", (string) $_POST["subbank"]);
                $idsubbank = $pieces3[0]; 
                $nmsubank = $pieces3[1];
            } elseif ($_POST['level'] == 'Bank Syariah') {
                $pieces3 = explode("|", (string) $_POST["subbankuus"]);
                $idsubbank = $pieces3[0]; 
                $nmsubank = $pieces3[1];
            }
     
           $pieces2 = explode("|", (string) $_POST["agen"]);
           $idagen = $pieces2[0]; 
           $nmagen = $pieces2[1];
     
           $fileada = "tdk";

           if (isset($_POST['passw'])) {
             $passganti = "ya";
           }
           else {
             $passganti = "tdk";
           }


                  //check file tanda tangan yang di upload
            //----------------------------------------
            if (!empty($_FILES['pic'])) {
              
                  $nilacak = rand(1000,100000);
                  $pic = $nilacak."-".$_FILES['pic']['name'];
                  $pic = preg_replace('/\s+/', '', $pic);
                  $pic_loc = $_FILES['pic']['tmp_name'];
                  
                  $folder = "pic/";

                        
              if(move_uploaded_file($pic_loc,$folder.$pic))
                    {

                          $fileada = "ya";
                          $commando->file_nama = $pic;
                          $commando->file_path = $folder;
                    }  
            }

            //----------------------------------------

            if ($_POST['level'] == 'Admin' || $_POST['level'] == 'Operator') {
                    if ($_POST["jab"] <> '') {
                        $idsubbank = '';$nmsubank = '';$idagen = '';$nmagen = '';
                        if($commando->UpdateUser($db_name,$_SESSION['idperbaikan'],$_POST['nama'],$_POST['passw'],$_POST['email'],$_POST['level'],
                                $idjab,$nmjab,
                                $idsubbank,$nmsubank,
                                '-',$idagen,$nmagen,
                                $fileada,
                                $passganti,
                                $_POST['status'])) {

                           echo "<script>alert('update sukses')</script>";
                           echo "<script>location.href='template.php?module=adminuser'</script>";
                        }
                                  else{

                                   echo "<script>alert('update gagal')</script>";
                                   echo "<script>location.href='template.php?module=adminuser'</script>";
                        }
                    } else {
                        echo "<script>alert('Simpan Gagal, Jabatan Harus Dipilih!')</script>";
                        echo "<script>location.href='template.php?module=adminuser'</script>";
                    }
            } elseif ($_POST['level'] == 'Bank') {
                    if ($_POST["subbank"] <> '') {
                        $idjab = '';$nmjab = '';$idagen = '';$nmagen = '';
                        if($commando->UpdateUser($db_name,$_SESSION['idperbaikan'],$_POST['nama'],$_POST['passw'],$_POST['email'],$_POST['level'],
                                $idjab,$nmjab,
                                $idsubbank,$nmsubank,
                                '-',$idagen,$nmagen,
                                $fileada,
                                $passganti,
                                $_POST['status'])) {

                           echo "<script>alert('update sukses')</script>";
                           echo "<script>location.href='template.php?module=adminuser'</script>";
                        }
                                  else{

                                   echo "<script>alert('update gagal')</script>";
                                   echo "<script>location.href='template.php?module=adminuser'</script>";
                        }
                    } else {
                        echo "<script>alert('Simpan Gagal, Sub. Bank Harus Dipilih!')</script>";
                        echo "<script>location.href='template.php?module=adminuser'</script>";
                    }
            } elseif ($_POST['level'] == 'Bank Syariah') {
         
                    if ($_POST["subbankuus"] <> '') {
                        $idjab = '';$nmjab = '';$idagen = '';$nmagen = '';
                        if($commando->UpdateUser($db_name,$_SESSION['idperbaikan'],$_POST['nama'],$_POST['passw'],$_POST['email'],$_POST['level'],
                                $idjab,$nmjab,
                                $idsubbank,$nmsubank,
                                '-',$idagen,$nmagen,
                                $fileada,
                                $passganti,
                                $_POST['status'])) {
                         //   include "pesansukses.php";
                          echo "<script>alert('update sukses')</script>";
                          echo "<script>location.href='template.php?module=adminuser'</script>";
                       } else {
                             //   include "pesangagal.php";
                                  echo "<script>alert('update sukses')</script>";
                                  echo "<script>location.href='template.php?module=adminuser'</script>";
                       }
                    } else {
                       echo "<script>alert('Simpan Gagal, Sub. Bank Syairah Harus Dipilih!')</script>";
                       echo "<script>location.href='template.php?module=adminuser'</script>";
                    }
            } elseif ($_POST['level'] == 'Agen') {
                    if ($_POST["agen"] <> '') {
                        $idjab = '';$nmjab = '';$idsubbank = '';$nmsubank = '';
                        if($commando->UpdateUser($db_name,$_SESSION['idperbaikan'],$_POST['nama'],$_POST['passw'],$_POST['email'],$_POST['level'],
                                $idjab,$nmjab,
                                $idsubbank,$nmsubank,
                                $_POST['sebagai'],$idagen,$nmagen,
                                $fileada,
                                $passganti,
                                $_POST['status'])) {

                           echo "<script>alert('update sukses')</script>";
                           echo "<script>location.href='template.php?module=adminuser'</script>";
                        }
                                  else{

                                   echo "<script>alert('update gagal')</script>";
                                   echo "<script>location.href='template.php?module=adminuser'</script>";
                        }
                    } else {
                        echo "<script>alert('Simpan Gagal, Sub. Bank Harus Dipilih!')</script>";
                        echo "<script>location.href='template.php?module=adminuser'</script>";
                    }
            }   
    
    }

}


?>


<table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
                                <thead>
                                    <tr>
                                        <th>Login</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th>Keterangan (Jabtan/Bank/Agen)</th>
                                        <!--th>Sebagai</th>
                                        <th>Dari</th>
                                        <th>Jabatan</th-->
                                        <th>Status</th>
                                         
                                         <th>Menu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                 foreach ($hasil as $row) {
                                  $hello = paramEncrypt('acak='.date('Y-m-dH:i:s').'&usernama='.$row->user_nama.'&userid='.$row->user_id.'&idmongo='.$row->_id);

                                   if ($row->user_level == 'Admin' || $row->user_level == 'Operator') {
                                   ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $row->user_id; ?></td>
                                         <td><?php echo $row->user_nama; ?></td>
                                         <td><?php echo $row->user_email; ?></td>
                                         <td><?php echo $row->user_level; ?></td>
                                         <td><?php echo $row->user_nm_jab; ?></td>
                                         <td><?php echo $row->user_status; ?></td>
                                        <td>
                                        <a href="template.php?module=adminuser&comi=2&id=<?php echo $hello; ?>" class="btn btn-success btn-xs"><i class="fa fa-list-alt"></i> Edit</a>
                                        </td>
                                    </tr>
                                 <?php
                                   } elseif ($row->user_level == 'Bank' || $row->user_level == 'Bank Syariah') {
                                 ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $row->user_id; ?></td>
                                         <td><?php echo $row->user_nama; ?></td>
                                         <td><?php echo $row->user_email; ?></td>
                                         <td><?php echo $row->user_level; ?></td>
                                         <td><?php echo $row->user_nm_subbank; ?></td>
                                         <td><?php echo $row->user_status; ?></td>
                                        <td>
                                        <a href="template.php?module=adminuser&comi=2&id=<?php echo $hello; ?>" class="btn btn-success btn-xs"><i class="fa fa-list-alt"></i> Edit</a>
                                        </td>
                                    </tr>
                                 <?php   
                                   } elseif ($row->user_level == 'Agen') {
                                 ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $row->user_id; ?></td>
                                         <td><?php echo $row->user_nama; ?></td>
                                         <td><?php echo $row->user_email; ?></td>
                                         <td><?php echo $row->user_level; ?></td>
                                         <td><?php echo $row->user_sebagai.' '.$row->user_nm_agen; ?></td>
                                         <td><?php echo $row->user_status; ?></td>
                                        <td>
                                        <a href="template.php?module=adminuser&comi=2&id=<?php echo $hello; ?>" class="btn btn-success btn-xs"><i class="fa fa-list-alt"></i> Edit</a>
                                        </td>
                                    </tr>
                                 <?php   
                                   }
                                 }
                                  ?>
                                   
                                </tbody>
                            </table>

<?php



if (empty($comi))
 {


    
          

?>

    

    <div class="alert alert-warning">
                      <i class="fa fa-info-circle fa-lg m-r-5 pull-left m-t-2"></i>Menambahkan Data User
              </div>

 <form class="form-horizontal"  method="POST"    enctype="multipart/form-data"   data-parsley-validate="true" name="demo-form2">

              

             
                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-4" for="login">Login :</label>
                  <div class="col-md-6 col-sm-6">
                    <input class="form-control" type="text" id="login" name="login"  data-parsley-required="true"  />
                    
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-4" for="nama">Nama :</label>
                  <div class="col-md-6 col-sm-6">
                    <input class="form-control" type="text" id="nama" name="nama"  data-parsley-required="true"  />
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-4" for="passw">Password :</label>
                  <div class="col-md-6 col-sm-6">
                    <input class="form-control" type="text" id="passw" name="passw"  data-parsley-required="true"  />
                  </div>
                </div>
     
                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-4" for="passw">Email :</label>
                  <div class="col-md-6 col-sm-6">
                    <input class="form-control" type="text" id="email" name="email"  data-parsley-required="true"  />
                  </div>
                </div>
     
                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-4" for="level">Level :</label>
                  <div class="col-md-6 col-sm-6">
                  <select name="level" id="level" class="form-control selectpicker" data-live-search="true" data-parsley-required="true"  data-style="btn-white" onchange="cek();" onclick="cek();">
                      <option value=""  >Pilih Level</option> 
                      <option value="Admin"  >Admin</option>                     
                      <option value="Operator"  >Operator</option>
                      <option value="Bank"  >Bank</option>                     
                      <option value="Bank Syariah"  >Bank Syariah</option>
                      <option value="Agen"  >Agen</option>
                    </select>
                  </div>
                </div>
     
                <div id="tampil1">
                    <div class="form-group">
                      <label class="control-label col-md-4 col-sm-4" for="jab">Jabatan :</label>
                      <div class="col-md-6 col-sm-6">
                      <select class="form-control  selectpicker"  id="jab" name="jab" data-live-search="true"  data-style="btn-white">
                          <option value=""> Pilih Data </option>
                                <?php  


                                if (!empty($jab)) {
                                   foreach ($jab as $rowa) {

                                        echo  "<option value='".$rowa->_id."|".$rowa->jab_nama."'>".$rowa->jab_nama."</option>";
                                                }
                                    }

                                ?>
                      </select>
                      </div>
                    </div>
                </div>    
             
                <div id="tampil2" style="display: none"> 
                    <div class="form-group">
                      <label class="control-label col-md-4 col-sm-4" for="subbank">Sub. Bank:</label>
                      <div class="col-md-6 col-sm-6">
                      <select class="form-control  selectpicker"  id="subbank" name="subbank" data-live-search="true"  data-style="btn-white">
                          <option value="-"> Pilih Sub. Bank </option>
                <?php  


                if (!empty($subbank)) {
                   foreach ($subbank as $rowb) {

                        echo  "<option value='".$rowb->_id."|".$rowb->banksub_nama."'>".$rowb->banksub_nama."</option>";
                                }
                    }

                ?>



                                            </select>
                      </div>
                    </div>                    
                </div>
     
                <div id="tampil3" style="display: none">
                    <div class="form-group">
                      <label class="control-label col-md-4 col-sm-4" for="sebagai">Sebagai :</label>
                      <div class="col-md-6 col-sm-6">
                      <select name="sebagai" class="form-control selectpicker" data-parsley-required="true"  data-style="btn-white">
                                                <option value="-"  >-</option>                         
                                                <option value="Agen"  >Agen</option>
                                                <option value="Sub Agen"  >Sub Agen</option>

                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-4 col-sm-4" for="agen">Dari :</label>
                      <div class="col-md-6 col-sm-6">
                      <select class="form-control  selectpicker"  id="agen" name="agen" data-live-search="true"  data-style="btn-white">
                          <option value=""> Pilih Data </option>
                <?php  


                if (!empty($agen)) {
                   foreach ($agen as $rowb) {

                        echo  "<option value='".$rowb->_id."|".$rowb->agen_nama."'>".$rowb->agen_nama."</option>";
                                }
                    }

                ?>



                                            </select>
                      </div>
                    </div>
                    
                    
                </div>
     
                <div id="tampil4" style="display: none"> 
                    <div class="form-group">
                      <label class="control-label col-md-4 col-sm-4" for="subbank">Sub. Bank Syariah:</label>
                      <div class="col-md-6 col-sm-6">
                      <select class="form-control  selectpicker"  id="subbankuus" name="subbankuus" data-live-search="true"  data-style="btn-white">
                          <option value="-"> Pilih Sub. Bank Syariah </option>
                <?php  


                if (!empty($subbankUUS)) {
                   foreach ($subbankUUS as $rowb) {

                        echo  "<option value='".$rowb->_id."|".$rowb->banksub_nama."'>".$rowb->banksub_nama."</option>";
                                }
                    }

                ?>



                                            </select>
                      </div>
                    </div>                    
                </div>

              

                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-4" for="persen">Signature (w:430 h:218 pixel) :</label>
                  <div class="col-md-6 col-sm-6">
                  <input class="form-control" type="file" id="pic" name="pic" 
                                            
                     />
                  </div>
                </div>
             
              
    
                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-4"></label>
                  <div class="col-md-6 col-sm-6">
                    <button type="submit" value="simpan" name="addcomi"  class="btn btn-primary">Simpan Data</button>
                  </div>
                </div>
                            </form>
              

                 
 <?php
   }

if (!empty($comi))
 {

            $var=decode("?".$_GET['id']);
            $idmongox = $var['idmongo'];
           
            $config = new Config();
            $db = $config->getConnection($db_name,$host);
            
              $commando = new Aser($db);

              $pr = $commando->CariUser($db_name,$idmongox);

                if (!empty($pr)) {
                foreach ($pr as $vak) {
                   $idedit = $vak->_id;
                   $_SESSION['idperbaikan'] = $vak->_id;

                   $login = $vak->user_id;
                  
                   $nama = $vak->user_nama;
                  // $passw = $vak->user_pass;
                  
                   $email = $vak->user_email;
                   $level = $vak->user_level;
                   $idjab = $vak->user_id_jab;
                   $nmjab = $vak->user_nm_jab;

                   $idsubbank = $vak->user_id_subbank;
                   $nmsubbank = $vak->user_nm_subbank;
                   
                   $sebagai = $vak->user_sebagai;

                   $idagen = $vak->user_id_agen;
                   $nmagen = $vak->user_nm_agen;

                   $signature = $vak->user_signature;

                  

                   $status = $vak->user_status;

                   
                }


                  //tampilkan jabatan
            //$jabxx = $commando->TampilJabxx($db_name,$idjab);
            //tampilkan agen
            //$agenxx = $commando->TampilAgenxx($db_name,$idagen);





                if ($status=='Tersedia') {
                  $stt1 = "Selected";
                  $stt2 = "";
                }
                if ($status=='Tidak Tersedia') {
                   $stt1 = "";
                   $stt2 = "Selected";
                }

                if ($sebagai=='-') {
                  $stt1a = "Selected";
                  $stt2b = "";
                  $stt2bb = "";
                }
                if ($sebagai=='Agen') {
                   $stt1a = "";
                  $stt2b = "Selected";
                  $stt22b = "";
                }
                if ($sebagai=='Sub Agen') {
                  $stt1a = "";
                 $stt2b = "";
                 $stt22b = "Selected";
               }


               if ($level == 'Admin') {
                   $lvl1 = "Selected";
                   $lvl2 = "";
                   $lvl3 = "";
                   $lvl4 = "";
                   $lvl5 = "";
                   
                   $display1 = 'style="display: block"';
                   $display2 = 'style="display: none"';
                   $display3 = 'style="display: none"';
                   $display4 = 'style="display: none"';
                   
               } elseif ($level == 'Operator') {
                   $lvl1 = "";
                   $lvl2 = "Selected";
                   $lvl3 = "";
                   $lvl4 = "";
                   $lvl5 = "";
                   
                   $display1 = 'style="display: block"';
                   $display2 = 'style="display: none"';
                   $display3 = 'style="display: none"';
                   $display4 = 'style="display: none"';
               } elseif ($level == 'Bank') {
                   $lvl1 = "";
                   $lvl2 = "";
                   $lvl3 = "Selected";
                   $lvl4 = "";
                   $lvl5 = "";
                   
                   $display1 = 'style="display: none"';
                   $display2 = 'style="display: block"';
                   $display3 = 'style="display: none"';
                   $display4 = 'style="display: none"';
               } elseif ($level == 'Bank Syariah') {
                   $lvl1 = "";
                   $lvl2 = "";
                   $lvl3 = "";
                   $lvl4 = "Selected";
                   $lvl5 = "";
                   
                   $display1 = 'style="display: none"';
                   $display2 = 'style="display: none"';
                   $display3 = 'style="display: none"';
                   $display4 = 'style="display: block"';
               } elseif ($level == 'Agen') {
                   $lvl1 = "";
                   $lvl2 = "";
                   $lvl3 = "";
                   $lvl4 = "";
                   $lvl5 = "Selected";
                   
                   $display1 = 'style="display: none"';
                   $display2 = 'style="display: none"';
                   $display3 = 'style="display: block"';
                   $display4 = 'style="display: none"';
               }



              }

       


?>

<div class="alert alert-warning">
                      <i class="fa fa-info-circle fa-lg m-r-5 pull-left m-t-2"></i>Edit Data User, (data tidak bisa dihapus / hanya bisa di nonaktifkan) 
              </div>

              <form class="form-horizontal"  method="POST"    enctype="multipart/form-data"   data-parsley-validate="true" name="demo-form">

             
                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-4" for="login">Login :</label>
                  <div class="col-md-6 col-sm-6">
                    <input class="form-control" disabled type="text" id="login" name="login" value="<?php echo $login; ?>"  data-parsley-required="true"  />
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-4" for="nama">Nama :</label>
                  <div class="col-md-6 col-sm-6">
                    <input class="form-control"  value="<?php echo $nama; ?>"  type="text" id="nama" name="nama"  data-parsley-required="true"  />
                  </div>
                </div>

                 <div class="form-group">
                  <label class="control-label col-md-4 col-sm-4" for="passw">Password :</label>
                  <div class="col-md-6 col-sm-6">
                    <input class="form-control" type="text" id="passw" name="passw" placeholder="Isi jika ingin ganti password"   />
                  </div>
                </div>
                  
                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-4" for="passw">Email :</label>
                  <div class="col-md-6 col-sm-6">
                    <input class="form-control" value="<?php echo $email; ?>" type="text" id="email" name="email"  data-parsley-required="true"  />
                  </div>
                </div>
                  
                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-4" for="level">Level :</label>
                  <div class="col-md-6 col-sm-6">
                  <select name="level" id="level" class="form-control selectpicker" data-live-search="true" data-parsley-required="true"  data-style="btn-white" onchange="cek();" onclick="cek();">
                      <option value=""  >Pilih Level</option> 
                      <option value="Admin" <?php echo $lvl1 ?>>Admin</option>                     
                      <option value="Operator" <?php echo $lvl2 ?>>Operator</option>
                      <option value="Bank" <?php echo $lvl3 ?>>Bank</option>                     
                      <option value="Bank Syariah" <?php echo $lvl4 ?>>Bank Syariah</option>
                      <option value="Agen" <?php echo $lvl5 ?> >Agen</option>
                    </select>
                  </div>
                </div>  

                <div id="tampil1" <?php echo $display1 ?>>  
                    <div class="form-group">
                      <label class="control-label col-md-4 col-sm-4" for="jab">Jabatan :</label>
                      <div class="col-md-6 col-sm-6">
                      <select class="form-control  selectpicker"  id="jab" name="jab" data-live-search="true"  data-style="btn-white">
                            <option value=""> Pilih Jabatan </option>
                            <?php  
                             

                            if (!empty($jab)) {
                               foreach ($jab as $rowa) {
                                   if ($rowa->_id == $idjab) {
                                       echo  "<option value='".$idjab."|".$nmjab."' selected>".$nmjab."</option>";
                                   } else {
                                       echo  "<option value='".$rowa->_id."|".$rowa->jab_nama."'>".$rowa->jab_nama."</option>";
                                   }
                                }
                            }
                            ?>
                      </select>
                      </div>
                    </div>
                </div>    
             
                <div id="tampil2" <?php echo $display2 ?>> 
                    <div class="form-group">
                      <label class="control-label col-md-4 col-sm-4" for="subbank">Sub. Bank:</label>
                      <div class="col-md-6 col-sm-6">
                      <select class="form-control  selectpicker"  id="subbanksyariah" name="subbanksyariah" data-live-search="true"  data-style="btn-white">
                          <option value=""> Pilih Sub. Bank </option>
                <?php  


                            if (!empty($subbank)) {
                               foreach ($subbank as $rowb) {
                                    if ($rowb->_id == $idsubbank) {
                                        echo  "<option value='".$rowb->_id."|".$rowb->banksub_nama."' selected>".$rowb->banksub_nama."</option>";
                                    } else {
                                        echo  "<option value='".$rowb->_id."|".$rowb->banksub_nama."'>".$rowb->banksub_nama."</option>";
                                    }
                                }
                            }
                            ?>



                                            </select>
                      </div>
                    </div>                    
                </div>  
                
                <div id="tampil3" <?php echo $display3 ?>>   
                        <div class="form-group">
                          <label class="control-label col-md-4 col-sm-4" for="sebagai">Sebagai :</label>
                          <div class="col-md-6 col-sm-6">
                          <select name="sebagai" class="form-control selectpicker" data-live-search="true" data-parsley-required="true"  data-style="btn-white">
                                                    <option value="-" <?php echo $stt1a; ?> >-</option>                         
                                                    <option value="Agen" <?php echo $stt2b; ?> >Agen</option>
                                                    <option value="Sub Agen" <?php echo $stt22b; ?> >Sub Agen</option>

                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-4 col-sm-4" for="agen">Dari :</label>
                          <div class="col-md-6 col-sm-6">
                          <select class="form-control  selectpicker"  id="agen" name="agen"  data-parsley-required="true" data-live-search="true"  data-style="btn-white">

                    <?php  

                       

                    if (!empty($agen)) {
                       foreach ($agen as $rowb) {
                           if ($rowb->_id == $idagen) {
                                echo  "<option value='".$idagen."|".$nmagen."' selected>".$nmagen."</option>"; 
                           } else {
                                echo  "<option value='".$rowb->_id."|".$rowb->agen_nama."'>".$rowb->agen_nama."</option>";
                           }
                        }
                    }

                    ?>



                                                </select>
                          </div>
                        </div>
                </div>
                  
                <div id="tampil4" <?php echo $display4 ?>> 
                    <div class="form-group">
                      <label class="control-label col-md-4 col-sm-4" for="subbank">Sub. Bank Syariah:</label>
                      <div class="col-md-6 col-sm-6">
                      <select class="form-control  selectpicker"  id="subbankuus" name="subbankuus" data-live-search="true"  data-style="btn-white">
                          <option value=""> Pilih Sub. Bank Syariah </option>
                <?php  


                if (!empty($subbankUUS)) {
                   foreach ($subbankUUS as $rowb) {
                        if ($rowb->_id == $idsubbank) {
                            echo  "<option value='".$rowb->_id."|".$rowb->banksub_nama."' selected>".$rowb->banksub_nama."</option>";
                        } else {
                            echo  "<option value='".$rowb->_id."|".$rowb->banksub_nama."'>".$rowb->banksub_nama."</option>";
                        }
                   }
                }

                ?>



                                            </select>
                      </div>
                    </div>                    
                </div>  
                  
            <?php
            if (!empty($signature)) {
             ?>
                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-4" for="persen">Tanda Tangan :</label>
                  <div class="col-md-6 col-sm-6">
                  <img src="pic/<?php echo $signature; ?>" class="img-rounded" alt="Cinque Terre" width="215" height="109">
                  </div>
                </div>
            <?php
            }  
             ?>
            
                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-4" for="persen">Signature (w:430 h:218 pixel) :</label>
                  <div class="col-md-6 col-sm-6">
                  <input class="form-control" type="file" id="pic" name="pic" 
                                            
                     />
                  </div>
                </div>


                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-4" for="message">Status :</label>
                  <div class="col-md-6 col-sm-6">
                    <select class="form-control" name="status" data-parsley-required="true">
                      
                                                <option value="Tersedia" <?php echo $stt1; ?> >Tersedia</option>
                                                <option value="Tidak Tersedia" <?php echo $stt2; ?> >Tidak Tersedia</option>
                                           
                                        </select>
                  </div>
                </div>
             
              
    
               
                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-4"></label>
                  <div class="col-md-6 col-sm-6">
                    <button type="submit" value="simpan" name="editcomi"  class="btn btn-danger">Update Data</button>
                    <button type="submit" value="kembali" name="cancelcomi"  class="btn btn-success">Cancel</button>
                  </div>
                </div>
                         
              

    </form>






<?php
}
?>


<script>
    function cek() {
        var level = document.getElementById("level");
        var leveltxt = level.options[level.selectedIndex].value;
        
        var x1 = document.getElementById("tampil1");
        var x2 = document.getElementById("tampil2");
        var x3 = document.getElementById("tampil3");
        var x4 = document.getElementById("tampil4");
        if(leveltxt == 'Bank') {
            if (x2.style.display === "none") {
                x1.style.display = "none";
                x2.style.display = "block";
                x3.style.display = "none";
                x4.style.display = "none";
              }
        } else if (leveltxt == 'Bank Syariah')  {
            if (x3.style.display === "none") {
                x1.style.display = "none";  
                x2.style.display = "none";
                x3.style.display = "none";
                x4.style.display = "block";
            }
        } else if (leveltxt == 'Agen')  {
            if (x3.style.display === "none") {
                x1.style.display = "none";  
                x2.style.display = "none";
                x3.style.display = "block";
                x4.style.display = "none";
            }
        } else {
            if (x1.style.display === "none") {
                x1.style.display = "block";  
                x2.style.display = "none";
                x3.style.display = "none";
                x4.style.display = "none";
            }
        }
    }
</script>