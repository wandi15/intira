<?php
//check hak akses


include_once './config/global.php';
include_once './library/url.php';
include_once '../vendor/autoload.php';
include_once './config/config.php';
include_once './vendor/wixel/gump/gump.class.php';


if(!isset($_SESSION['user_id'])){
  session_destroy();
  echo "<script>location.href='logout.php'</script>";
}
else {

            $config = new Config();
	    $db = $config->getConnection($db_name,$host);
     
                        	
            }
echo '  <li class="has-sub">';
            //if ($sbgadmin=="ya") { 
                echo '  <a href="javascript:;">
                            <b class="caret pull-right"></b>
                            <i class="fa fa-home"></i>
                            <span>Profil</span>
                        </a>
                            <ul class="sub-menu">
				<li><a href="?module=profil">Perusahaan</a></li>
                            </ul>
    
                        <a href="javascript:;">
                            <b class="caret pull-right"></b>
                            <i class="fa fa-gears"></i>
                            <span>Setting</span>
                        </a>
                            <ul class="sub-menu">
                                <li><a href="?module=setting_menu">Menu</a></li>
                                <li><a href="?module=setting_user">User</a></li>
                                <li><a href="?module=setting_provinsi">Provinsi</a></li>
                                <li><a href="?module=setting_kabkota">Kab./Kota</a></li>
                                <li><a href="?module=setting_kecamatan">Kecamatan</a></li>
                                <li><a href="?module=setting_kelurahan">Kelurahan</a></li>
                                <li><a href="?module=setting_branch">Branch</a></li>
                            </ul>
                            ';
                        
            //}
            
            
            /*$listMenu = $commando->TampilMenuHeader($db_name);
            foreach ($listMenu as $value) {
                $cekHakAkses1 = $commando->CekHakAkes($db_name,$idUser,$value->_id);
                if (!empty($cekHakAkses1)) {
                    echo '<a href="javascript:;">
                                <b class="caret pull-right"></b>
                                <i class="'.$value->icon.'"></i>
                                <span>'.$value->title.'</span>
                         </a>';
                         
                }
                    echo '<ul class="sub-menu">';
                $listMenuSub = $commando->TampilMenuSub($db_name,$value->_id);
                foreach ($listMenuSub as $value1) {
                    $listMenuSub1 = $commando->TampilMenuSub($db_name,$value1->_id);
                    $cekHakAkses2 = $commando->CekHakAkes($db_name,$idUser,$value1->_id);
                    if (!empty($cekHakAkses2)) {
                        
                        if (empty($listMenuSub1)) {
                            echo '<li><a href="?module='.$value1->url.'">'.$value1->title.'</a></li>';
                        } else {
                            echo '<i class="'.$value1->icon.'"></i>&nbsp; <span>'.$value1->title.'</span>';
                        }
                    }
                    
                    foreach ($listMenuSub1 as $value2) {
                        $cekHakAkses3 = $commando->CekHakAkes($db_name,$idUser,$value2->_id);
                        if (!empty($cekHakAkses3)) {
                            echo '<li><a href="?module='.$value2->url.'">'.$value2->title.'</a></li>';
                        }
                    }
                }
                echo '</ul>';
            }
}
?>