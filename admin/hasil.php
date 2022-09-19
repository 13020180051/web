<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">MATRIX TERNORMALISASI</h4>
            <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                 
                  
                    </div>
                </div>
                </div>

            <table class="table-responsive">
            <table class="table table-striped mb-0">
                
                <tr>
                    <th rowspan="2">Alternatif</th>
                    <th colspan="7">Kriteria</th>
                </tr>
                <tr>
                  
                
                    <?php
                    include "../koneksi.php";
                    $hasil_ranks = array();
                    // $kriteria = "SELECT * FROM tb_kriteria";
                    $query = mysqli_query ($con, "SELECT * FROM tb_kriteria");
                    while ($row = mysqli_fetch_array($query)){
                      ?>
                      <th><?php echo $row['kriteria'];?></th>
                    <?php } ?>
                </tr>
                <?php
                include "../koneksi.php";
                $sql = mysqli_query($con, "SELECT * FROM tb_alternatif");
                while ($row2 = mysqli_fetch_array($sql)){
                  ?>
                  <tr>
                    <td><center><?php echo $row2['alternatif'];?></center></td>
                    <?php
                    // tampilkan nilai dengan id_alternatif ...
                    $hasil_normalisasi=0;
                    $nilai = mysqli_query($con, "SELECT * FROM tb_nilai WHERE id_alternatif= '$row2[id_alternatif]' ORDER BY id_kriteria");
                    while ($data_nilai = mysqli_fetch_array($nilai)){
                      $sql1 = mysqli_query($con, "SELECT * FROM tb_kriteria WHERE id_kriteria = '$data_nilai[id_kriteria]' ORDER BY id_kriteria");
                      while ($row = mysqli_fetch_array($sql1)) {
                       if ($row['sifat']=="cost"){
                        $min = mysqli_query($con, "SELECT id_kriteria, MIN(`nilai`) AS min FROM tb_nilai WHERE id_kriteria ='$data_nilai[id_kriteria]' GROUP BY id_kriteria");
                        while ($data_min = mysqli_fetch_array($min)){ ?>
                        <td>
                          <center>
                            <?php
                            echo number_format($hasil = $data_min['min']/$data_nilai['nilai'],2);
                            $hasil_kali = $hasil*$row['bobot'];
                            $hasil_normalisasi= $hasil_normalisasi+$hasil_kali;
                            ?>
                          </center>

                        </td>
                        <?php } ?>

                        <?php 
                       } else if ($row['sifat']=="benefit") {
                        $max = mysqli_query($con, "SELECT id_kriteria, MAX(nilai) AS max FROM tb_nilai WHERE id_kriteria='$data_nilai[id_kriteria]' GROUP BY id_kriteria");
                        while ($data_max = mysqli_fetch_array($max)){ ?>
                        <td>
                          <center>
                            <?php 
                            echo $hasil = $data_nilai['nilai']/$data_max['max'];
                            $hasil_kali = $hasil*$row['bobot'];
                            $hasil_normalisasi= $hasil_normalisasi + $hasil_kali;
                            ?>
                          </center>
                        </td>
                        <?php } ?>
                      <?php } ?>
                      <?php } } ?> 
                  </tr>
                <?php } ?>
                
            </table>
            </table>
            </div>
        </div>
        </div>
    </div>
</div>
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">PEMBOBOTAN</h4>
            <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                    </div>
                </div>
                </div>
            <table class="table-responsive">
              <table class="table table-striped mb-0">
              
                <tr>
                    <th rowspan='2'>Alternatif</th>
                    <th colspan='7'>Kriteria</th>
                    <th rowspan='2'>Hasil</th>
                </tr>
                <tr>
                    <?php
                    include "../koneksi.php";
                    $query = mysqli_query ($con, "SELECT * FROM tb_kriteria");
                    while ($row = mysqli_fetch_array($query)){
                      ?>
                      <th><?php echo $row['kriteria'];?></th>
                    <?php } ?>
                </tr>
                <?php
                $hasil_ranks = array();
                $sql = mysqli_query($con, "SELECT * FROM tb_alternatif");
                while ($row2 = mysqli_fetch_array($sql)){
                  ?>
                  <tr>
                    <td><center><?php echo $row2['alternatif'];?></center></td>
                    <?php
                    // tampilkan nilai dengan id_alternatif ...
                    $hasil_normalisasi=0;
                    $nilai = mysqli_query($con, "SELECT * FROM tb_nilai WHERE id_alternatif= '$row2[id_alternatif]' ORDER BY id_kriteria");
                    while ($data_nilai = mysqli_fetch_array($nilai)){
                      $sql1 = mysqli_query($con, "SELECT * FROM tb_kriteria WHERE id_kriteria = '$data_nilai[id_kriteria]' ORDER BY id_kriteria");
                      while ($row = mysqli_fetch_array($sql1)) {
                        if ($row['sifat']=="cost"){
                        $min = mysqli_query($con, "SELECT id_kriteria, MIN(`nilai`) AS min FROM tb_nilai WHERE id_kriteria ='$data_nilai[id_kriteria]' GROUP BY id_kriteria");
                        while ($data_min = mysqli_fetch_array($min)){ ?>
                        <td>
                          
                            <?php
                            number_format($hasil = $data_min['min']/$data_nilai['nilai'],2);
                            echo $hasil_kali = $hasil*$row['bobot'];
                            $hasil_normalisasi= $hasil_normalisasi+$hasil_kali;
                            ?>
                          

                        </td>
                        <?php } ?>

                        <?php 
                        } elseif ($row['sifat']=="benefit") {
                        $max = mysqli_query($con, "SELECT id_kriteria, MAX(nilai) AS max FROM tb_nilai WHERE id_kriteria='$data_nilai[id_kriteria]' GROUP BY id_kriteria");
                        while ($data_max = mysqli_fetch_array($max)){ ?>
                        <td>
                          
                            <?php 
                            $hasil = $data_nilai['nilai']/$data_max['max'];
                            echo $hasil_kali = $hasil*$row['bobot'];
                            $hasil_normalisasi= $hasil_normalisasi+$hasil_kali;
                            ?>
                          
                        </td>
                        <?php } ?>
                        <?php } 
                        ?>
                      <?php } } ?> 
                      <td>
                        
                          <?php 
                          $hasil_rank['nilai'] = $hasil_normalisasi;
                          $hasil_rank['alternatif'] = $row2['alternatif'];
                          array_push($hasil_ranks,$hasil_rank);
                          echo $hasil_normalisasi; ?>
                        
                      </td>
                  </tr>
                <?php } ?>
                
              </table>
            </table>
            </div>
        </div>
        </div>
    </div>
</div>
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">HASIL RANKING</h4>
            <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                </div>
                </div>
                </div>
            <table class="table-responsive">
              <table class="table table-striped mb-0">
              
                <tr>
                    <th><center>RANKING</center></th>
                    <th><center>Alternatif</center></th>
                    <th><center>Hasil</center></th>
                </tr>
                <tr>
                    
                    <?php 
                    include "../koneksi.php";
                    $no = 1;
                    rsort($hasil_ranks);
                    foreach ($hasil_ranks as $rank) {
                      ?>
                      <tr>
                        <td><center><?php echo $no++ ?></center></td>
                        <td><center><?php echo $rank['alternatif']?></center></td>
                        <td><center><?php echo $rank['nilai'] ?></center></td>
                      </tr>
                    <?php } ?>
                </tr>
                
              </table>
            </table>
            </div>
        </div>
        </div>
    </div>
</div>
