<?php
session_start();

if($_SESSION['user_nik'] <> 'superadmin'){
  //session_destroy();
  //echo "<script>location.href='indexnn.php'</script>";
  echo "<script>location.href='home.php'</script>";
}
else {

		include_once './config/global.php';
		include_once '../vendor/autoload.php';
		include_once './config/config.php';

	    try {

            
            $config = new Config();
            $db = $config->getConnection($db_name,$host);
            
            
                     
                     
        
	     }catch(MongoDB\Driver\Exception\Exception $e){
	        $pesan = "Exception:". $e->getMessage(). "\n";
	        exit;
        }
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
<?php
include_once "./head_admin.php";
?>
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		<div id="header" class="header navbar navbar-default navbar-fixed-top">
			<!-- begin container-fluid -->
			<div class="container-fluid">
				<!-- begin mobile sidebar expand / collapse button -->
                                
				<div class="navbar-header">
                                        
					<a href="admin.php" class="navbar-brand"><center>Admin INTIRA</center></a>
					<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- end mobile sidebar expand / collapse button -->
				
				<!-- begin header navigation right -->
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<?php
                          include "menunotifikasiatas.php";

						?>
					</li>
					<li class="dropdown">
						<?php 
                          if ($_SESSION['user_sebagaiku']=="Agen" or $_SESSION['user_sebagaiku']=="Sub Agen" or $_SESSION['user_level']=="Bank" or $_SESSION['user_level']=="Bank Syariah") {
                              
                          } else {
                                include "menunotifikasiatas2.php";
                          }

						?>
					</li>
                                        <li class="dropdown">
						<?php 
                          if ($_SESSION['user_sebagaiku']=="Agen" or $_SESSION['user_sebagaiku']=="Sub Agen" or $_SESSION['user_level']=="Bank" or $_SESSION['user_level']=="Bank Syariah") {
                              
                          } else {
                                include "menunotifikasiatas1.php";
                          }

						?>
					</li>
					<li class="dropdown navbar-user">
						<?php
                         include "menuataskanan.php";
						?>
					</li>
				</ul>
				<!-- end header navigation right -->
			</div>
			<!-- end container-fluid -->
		</div>
		<!-- end #header -->
		
		<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<?php
                 include_once "logosamping.php";
				?>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav">
				<?php
                     include "menukiri.php";
					?>
					<!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
			        <!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<?php
           $module = "";
           $page = "";
           
           if (!empty($_GET['module'])) {

           $module = $_GET['module'];
           
           }

           if (!empty($_GET['page'])) {

           $page = $_GET['page'];

           }
      
           if (!empty($module) && !empty($page))  {
           	   include "modules/".$module."/".$page.".php";

           }
           else if (!empty($module) && empty($page)) {
           	   include "modules/".$module."/index.php";
           }
           else {
           include "main.php";
           }

           $module = null;
           $page = null;
           ?>
		<!-- end #content -->

		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	<?php
     include_once "./bottom_admin.php";
     ?>
</body>
</html>
<?php
}
?>