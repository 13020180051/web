<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">TABEL DATA KARYAWAN</h4>
                <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel-4">Form Pembelian</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" id="formAddKaryawan">
                        <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nama Lengkap:</label>
                            <input type="text" minlength="1" class="form-control" id="textnama" name="textnama" required="">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Tempat Lahir:</label>
                            <input type="text" minlength="1" class="form-control" id="texttempat" name="texttempat" required="">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Tanggal Lahir:</label>
                            <input type="date" minlength="1" class="form-control" id="textlahir" name="textlahir" required="">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Jenis Kelamin:</label>
                            <div class="form-radio">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="L" required=""> Laki-Laki <i class="input-helper"></i></label>
                            </div>
                            <div class="form-radio">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="P" required=""> Perempuan <i class="input-helper"></i></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Alamat:</label>
                            <textarea class="form-control" id="textalamat" rows="4" name="textalamat" required=""></textarea>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nomor Handphone:</label>
                            <input type="text" minlength="1" class="form-control" id="texthp" name="texthp" required="">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Email:</label>
                            <input type="email" minlength="1" class="form-control" id="textemail" name="textemail" required="">
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Username:</label>
                            <input type="text" minlength="1" class="form-control" id="textusername" name="textusername" required="">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Password:</label>
                            <input type="password" minlength="1" class="form-control" id="textpassword" name="textpassword" required="">
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
                <div class="modal fade" tabindex="-1" id="modalInvoiceS" role="dialog" aria-labelledby="exampleModalLabel-4" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <button type="button" class="close" onclick="printDiv('#divToPrint')">
                        <i class="fa fa-print"></i>
                    </button>
                    <div class="invoice-box" id="divToPrint">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        <table cellpadding="0" cellspacing="0">
                            <tr class="top">
                                <td colspan="2">
                                    <table>
                                        <tr>
                                            <td class="title">
                                                <img src="../images/Untitled-2.png" style="width:100%; max-width:200px;">
                                            </td>
                                            <td>
                                                <br>
                                                <b>Nota Pembelian</b><br>
                                                Nota #: <h6 id="detail_id_pembelian"></h6>
                                                Tanggal: <h6 id="detail_tanggal"></h6>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr class="information">
                                <td colspan="2">
                                    <table>
                                        <tr>
                                            <td>
                                                Jalan Maju Mundur<br>
                                                Makassar, Sulawesi Selatan<br>
                                                Indonesia
                                            </td>
                                            
                                            <td>
                                                Owner Rumah Kopi<br>
                                                Labaco bin Rewa<br>
                                                owner@rumahkopi.com
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            
                            <tr class="heading">
                                <td>
                                    Metode Pembayaran
                                </td>
                                
                                <td>
                                    #
                                </td>
                            </tr>
                            
                            <tr class="details">
                                <td>
                                    Tunai
                                </td>
                                
                                <td>
                                    
                                </td>
                            </tr>
                            
                            <tr class="heading">
                                <td>
                                    Barang
                                </td>
                                
                                <td>
                                    Harga
                                </td>
                            </tr>
                            
                            <tr class="item">
                                <td>
                                    <p id="detail_nama"></p>
                                </td>
                                
                                <td>
                                    <p id="detail_harga"></p>
                                </td>
                            </tr>
                            
                            <tr class="item last">
                                <td>
                                    <p>Quantity</p>
                                </td>
                                
                                <td>
                                    <p id="detail_qty"></p>
                                </td>
                            </tr>
                            
                            <tr class="total">
                                <td></td>
                                
                                <td>
                                Total: <p id="detail_total"></p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    </div>
                </div>
                </div>
                <button type="button" class="btn btn-success btn-fw" data-toggle="modal" data-target="#modalAdd"><i class="mdi mdi-plus"></i>Tambah Baru</button>
            <br><br>
            <table class="table" id="tableDataKaryawan">
                <thead>
                <tr>
                    <th>ID Karyawan</th>
                    <th>Username</th>
                    <th>Nama Karyawan</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th width="1px">Action</th>
                </tr>
                </thead>
            </table>
            </div>
        </div>
        </div>
    </div>
</div>