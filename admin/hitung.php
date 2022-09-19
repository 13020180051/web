<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">MATRIX KEPUTUSAN (X)</h4>
            <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-4">Form Input Nilai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="" id="formAddNilai">
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Alternatif:</label>
                            <select id="alternatif" name="alternatif" required="" class="form-control">
                            <?php
                                $qalternatif = mysqli_query($con, "SELECT * FROM tb_alternatif");
                                while ($c=mysqli_fetch_array($qalternatif)) {
                                echo "<option value=\"$c[id_alternatif]\">$c[alternatif]</option>";
                                }
                            ?>
                            </select>
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Kriteria:</label>
                        <!-- <select id="subkriteria" name="subkriteria" required="" class="form-control"> -->
                        <?php
                                                                        
                            $sql = "SELECT * FROM `tb_kriteria`";
                            $query = mysqli_query($con, $sql);

                                    
                            $i=1;
                            while ($row = mysqli_fetch_array($query)){

                            $sql1 = "SELECT * FROM `tb_subkriteria` WHERE `id_kriteria`=".$row['id_kriteria'];
                            $query1 = mysqli_query($con, $sql1);
                                
                            echo ' <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">'.$row['kriteria'].'</label>
                                    <div class="col-sm-9">
                                        <select class="form-select digits" >
                                            <option value="null">Pilih</option>';
                                            
                                            while ($row1 = mysqli_fetch_array($query1)){
                                
                                            echo '<option value="'.$row1['nilai'].'">'.$row1['subkriteria'].'</option>';

                                            }

                                    echo '</select>
                                    </div>
                                    </div>
                                    
                                    ';
                            
                                $i++;
                            }
                                    
                            ?>
                            
                        </div>
                        
                        </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                    </div>
                </div>
                </div>


                <button type="button" class="btn btn-success btn-fw" data-toggle="modal" data-target="#modalAdd"><i class="mdi mdi-plus"></i>Input Nilai Keputusan</button>
            <br><br>
            <table class="table-responsive">
            
              <table class="table table-striped mb-0">
                
                <tr>
                    <th rowspan='2'>Alternatif</th>
                    <th colspan="7">Kriteria</th>
                </tr>
                <tr>
                    <?php
                    include "../koneksi.php";
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
                    $nilai = mysqli_query($con, "SELECT*FROM tb_nilai WHERE id_alternatif= '$row2[id_alternatif]' ORDER BY id_kriteria");
                    while ($row3 = mysqli_fetch_array($nilai)){?>
                    <td><center><?php echo $row3['nilai'];?></center></td>
                    <?php } ?>
                  </tr>
                <?php } ?>
                </table>
            
            </table>
            </div>
        </div>
        </div>
    </div>
</div>