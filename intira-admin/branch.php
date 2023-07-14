<?php
include './head.php';

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
      <div class="row">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                Branch
              </h2>
                <p>
            </div>        
              <table class="table table-hover" style="background-color: white">
                    <tr>
                        <th>No.</th>
                        <th>Nama Cabang</th>
                        <th>Alamat</th>
                        <th style="width: 150px">No Kontak</th>                        
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Cabang Antasari</td>
                        <td>Jl. P. Antasari RT 06, Kel. Pekapuran, Kec. Banjarmasin Timur, Kota Banjarmasin</td>
                        <td>0823 5147 0880</td>                        
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Cabang Cempaka</td>
                        <td>Jl. Cempaka Raya RT. 25 No. 06, Kel. Telaga Biru, Kec. Banjarmasin Barat, Kota Banjarmasin</td>
                        <td>0812 5079 2997</td>                        
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Cabang Handil Bakti</td>
                        <td>Jl. Trans Kalimantan Handil Bakti Ruko B1 RT 38 SPG. Grand Purnama 1, Kec. Alalak, Kab. Batola</td>
                        <td>0813 4829 4545</td>                        
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Cabang Kampung Melayu</td>
                        <td>Jl. Simpang Sei. Bilu No. 01 RT. 19 Kel. Kampung Melayu, Kec. Banjarmasin Tengah, Kota Banjarmasin</td>
                        <td>0813 4622 1577</td>                        
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Cabang Perdagangan</td>
                        <td>Jl. Perdagangan RT 23, Kel. Kayu Tangi, Kec. Banjarmasin Utara, Kota Banjarmasin</td>
                        <td>0821 5212 8998</td>                        
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Cabang Sungai Lulut</td>
                        <td>Jl. Veteran KM. 4,5 RT 29 No 29, Kel. Pengambangan, Kec. Banjarmasin Timur, Kota Banjarmasin</td>
                        <td>0813 4887 8553</td>                        
                    </tr>
                </table>
                </p>
            </div>
          </div>
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