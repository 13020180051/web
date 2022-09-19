<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">TABEL DATA KRITERIA</h4>
            <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-4">Form Kriteria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="" id="formAddKriteria">
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Kriteria:</label>
                        <input type="text" class="form-control" id="kriteria" name="kriteria" required="">
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Sifat :</label>
                        <select class="form-control form-select" id="sifat" name="sifat" required="">
                          <option value="benefit">Benefit</option>
                          <option value="cost">Cost</option>
                        </select>
                      </div>
                        <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Bobot:</label>
                        <input type="text" class="form-control" id="bobot" name="bobot" required="">
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
                    <h5 class="modal-title" id="exampleModalLabel-4">Form Edit Kriteria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="" id="formEditKriteria">
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">ID Kriteria:</label>
                        <input type="text" class="form-control" id="id_kriteria2" name="id_kriteria2" required="" readonly="">
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Kriteria:</label>
                        <input type="text" class="form-control" id="kriteria2" name="kriteria2" required="">
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Sifat :</label>
                        <select class="form-control form-select" id="sifat2" name="sifat2" required="">
                          <option value="benefit">Benefit</option>
                          <option value="cost">Cost</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Bobot :</label>
                        <input type="text" class="form-control" id="bobot2" name="bobot2" required="">
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
          <table class="table" id="tableDataKriteria">
            <thead>
              <tr>
                <th>ID Kriteria</th>
                <th>Kriteria</th>
                <th>Sifat</th>
                <th>Bobot</th>
                <th width="1px">Action</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>