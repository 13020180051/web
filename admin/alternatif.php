<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">TABEL DATA ALTERNATIF</h4>
            <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-4">Form Alternatif</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="" id="formAddAlternatif">
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Alternatif:</label>
                        <input type="text" class="form-control" id="alternatif" name="alternatif" required="">
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
                    <h5 class="modal-title" id="exampleModalLabel-4">Form Edit Alternatif</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="" id="formEditAlternatif">
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">ID Alternatif:</label>
                        <input type="text" class="form-control" id="id_alternatif2" name="id_alternatif2" required="" readonly="">
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Alternatif:</label>
                        <input type="text" class="form-control" id="alternatif2" name="alternatif2" required="">
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
          <table class="table" id="tableDataAlternatif">
            <thead>
              <tr>
                <th>ID Alternatif</th>
                <th>Alternatif</th>
                <th width="1px">Action</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>