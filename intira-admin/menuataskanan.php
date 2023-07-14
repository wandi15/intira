<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							
							
							<span class="hidden-xs"><?php 
							if (isset($_SESSION['user_nama'])) {
							echo $_SESSION['user_nama']; 
							}
							else {
								//
							}
							
							?></span> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu animated fadeInLeft">
							<li class="arrow"></li>
							<li><a href="?module=gantipassword">Ganti Password</a></li>
							
							<li class="divider"></li>
							<li><a href="logout.php">Log Out</a></li>
						</ul>