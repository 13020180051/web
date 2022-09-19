<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">TABEL DATA SUBKRITERIA</h4>
            <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-4">Form Subkriteria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="" id="formAddSubkriteria" >
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Subkriteria:</label>
                        <input type="text" class="form-control" id="subkriteria" name="subkriteria" required="">
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Kriteria:</label>
                        <select id="id_kriteria" name="id_kriteria" required="" class="form-control">
                          <?php
                            $qkriteria = mysqli_query($con, "SELECT * FROM tb_kriteria");
                            while ($c=mysqli_fetch_array($qkriteria)) {
                              echo "<option value=\"$c[id_kriteria]\">$c[kriteria]</option>";
                            }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Sifat :</label>
                        <select class="form-control form-select" id="sifat" name="sifat" required="">
                          <option value="benefit">Benefit</option>
                          <option value="cost">Cost</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nilai:</label>
                        <input type="text" class="form-control" id="nilai" name="nilai" required=""></input>
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
            <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-4">Form Subkriteria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="" id="formEditSubkriteria">
                    <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">ID Subkriteria:</label>
                        <input type="text" class="form-control" id="id_subkriteria2" name="id_subkriteria2" required="" readonly="">
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Subkriteria:</label>
                        <input type="text" class="form-control" id="subkriteria2" name="subkriteria2" required="">
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Kriteria:</label>
                        <select id="id_kriteria2" name="id_kriteria2" required="" class="form-control">
                          <?php
                            $qkriteria = mysqli_query($con, "SELECT * FROM tb_kriteria");
                            while ($c=mysqli_fetch_array($qkriteria)) {
                              echo "<option value=\"$c[id_kriteria]\">$c[kriteria]</option>";
                            }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Sifat :</label>
                        <select class="form-control form-select" id="sifat2" name="sifat2" required="">
                          <option value="benefit">Benefit</option>
                          <option value="cost">Cost</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nilai:</label>
                        <input class="form-control" id="nilai2" name="nilai2" required=""></input>
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
            <button type="button" class="btn btn-success btn-fw" data-toggle="modal" data-target="#modalAdd"><i class="mdi mdi-plus"></i>Tambah Baru</button>
          <br><br>
          <table class="table" id="tableDataSubkriteria">
            <thead>
              <tr>
                <th>ID Subkriteria</th>
                <th>Subkriteria</th>
                <th>Kriteria</th>
                <th>Sifat</th>
                <th>Nilai</th>
                <th width="1px">Action</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>