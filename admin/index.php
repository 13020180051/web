<?php
session_start();
if(!isset($_SESSION['username'])){
  header ("location:../logout.php");
}
if($_SESSION['status'] != "admin"){
  header ("location:../logout.php");
}
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Administrator</title>
    <link rel="icon" href="../images/logo-mini.png" type="image/x-icon">
    <!-- plugins:css -->
    <link rel="stylesheet" href="../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../vendors/iconfonts/puse-icons-feather/feather.css">
    <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="../vendors/iconfonts/font-awesome/css/font-awesome.min.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- endinject -->
    <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- <link rel="shortcut icon" href="../images/logo.ico" /> -->
</head>

<body>
    <div class="container-scroller">
        <!-- partial:../partials/_navbar.html -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
            <a class="navbar-brand brand-logo" href="?mod=dashboard"><img src="" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="?mod=dashboard"><img src="../images/logo-mini.png" alt="logo"/></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
            </button>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
            </button>
        </div>
        </nav>
        <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:../partials/_sidebar.html -->
        <?php include 'menu.php'; ?>
        <!-- partial -->
        <div class="main-panel">
        <?php include 'isi.php'; ?>
        <!-- content-wrapper ends -->
        <!-- partial:../partials/_footer.html -->
        <?php include 'footer.php'; ?>
        <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../vendors/js/vendor.bundle.base.js"></script>
    <script src="../vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="../js/off-canvas.js"></script>
    <script src="../js/hoverable-collapse.js"></script>
    <script src="../js/misc.js"></script>
    <script src="../js/settings.js"></script>
    <script src="../js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../js/morris.js"></script>
    <!-- End custom js for this page-->
    <!-- DATA TABLE SCRIPTS -->
    <script src="../js/dataTables/jquery.dataTables.js"></script>
    <script src="../js/dataTables/dataTables.bootstrap.js"></script>
    <script>
        function parseDataAlternatif(data) {
      var res=data.split("|");
      // console.log(res);
      document.getElementById("id_alternatif2").value = res[0];
      document.getElementById("alternatif2").value = res[1];
    }
    function parseDataKriteria(data) {
      var res=data.split("|");
      // console.log(res);
      document.getElementById("id_kriteria2").value = res[0];
      document.getElementById("kriteria2").value = res[1];
      document.getElementById("sifat2").value = res[2];
      document.getElementById("bobot2").value = res[3];
    }
    function parseDataSubkriteria(data) {
      var res=data.split("|");
      // console.log(res);
      document.getElementById("id_subkriteria2").value = res[0];
      document.getElementById("subkriteria2").value = res[1];
      document.getElementById("kriteria2").value = res[2];
      document.getElementById("sifat2").value = res[3];
      document.getElementById("nilai2").value = res[4];
    }
    var tableDataAlternatif,tableDataKriteria,tableDataSubkriteria;
    $(document).ready(function() {
        tableDataAlternatif=$('#tableDataAlternatif').DataTable( {
            "ajax": "../datamodel.php?page=alternatif",
            "columns": [
                { "data": "id_alternatif" },
                { "data": "alternatif" },
                {// this is Actions Column 
                    mRender: function (data, type, row) {
                        var datacoba= "'"+row.id_alternatif+"|"+row.alternatif+"'";
                        var linkDetail = '<a href="#" class="btn-sm btn-primary" onclick="parseDataAlternatif('+datacoba+');" data-toggle="modal" data-target="#modalEdit"><i class="fa fa-pencil"></i> Edit&nbsp;</a><br><br><br>';
                        linkDetail = linkDetail.replace("-1", row.id_alternatif);

                        var linkDelete = '<a href="#" onclick="deletealternatif(\'-1\')" class="btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>';
                        linkDelete = linkDelete.replace("-1", row.id_alternatif);

                        return linkDetail+linkDelete;
                    }
                }
            ]
        });
    });
    $(document).ready(function() {
        tableDataKriteria=$('#tableDataKriteria').DataTable( {
            "ajax": "../datamodel.php?page=kriteria",
            "columns": [
                { "data": "id_kriteria" },
                { "data": "kriteria" },
                { "data": "sifat" },
                { "data": "bobot" },
                {// this is Actions Column 
                    mRender: function (data, type, row) {
                        var datacoba= "'"+row.id_kriteria+"|"+row.kriteria+"|"+row.sifat+"|"+row.bobot+"'";
                        var linkDetail = '<a href="#" class="btn-sm btn-primary" onclick="parseDataKriteria('+datacoba+');" data-toggle="modal" data-target="#modalEdit"><i class="fa fa-pencil"></i> Edit&nbsp;</a><br><br><br>';
                        linkDetail = linkDetail.replace("-1", row.id_kriteria);

                        var linkDelete = '<a href="#" onclick="deletekriteria(\'-1\')" class="btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>';
                        linkDelete = linkDelete.replace("-1", row.id_kriteria);

                        return linkDetail+linkDelete;
                    }
                }
            ]
        });
    });
    $(document).ready(function() {
        tableDataSubkriteria=$('#tableDataSubkriteria').DataTable( {
            "ajax": "../datamodel.php?page=subkriteria",
            "columns": [
                { "data": "id_subkriteria" },
                { "data": "subkriteria" },
                { "data": "kriteria" },
                { "data": "sifat" },
                { "data": "nilai" },
                {// this is Actions Column 
                    mRender: function (data, type, row) {
                        var datacoba= "'"+row.id_subkriteria+"|"+row.subkriteria+"|"+row.id_kriteria+"|"+row.sifat+"|"+row.nilai+"'";
                        var linkDetail = '<a href="#" class="btn-sm btn-primary" onclick="parseDataSubkriteria('+datacoba+');" data-toggle="modal" data-target="#modalEdit"><i class="fa fa-pencil"></i> Edit&nbsp;</a><br><br><br>';
                        linkDetail = linkDetail.replace("-1", row.id_subkriteria);

                        var linkDelete = '<a href="#" onclick="deletesubkriteria(\'-1\')" class="btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>';
                        linkDelete = linkDelete.replace("-1", row.id_subkriteria);

                        return linkDetail+linkDelete;
                    }
                }
            ]
        });
    });
        $('#modalAdd').on('hidden.bs.modal', function() {
        $(this)
        .find("input,textarea,select")
        .val('')
        .end()
        .find("input[type=checkbox], input[type=radio]")
        .prop("checked", "")
        .end();
        });
            $('#formAddAlternatif').on('submit', function (e) {
        e.preventDefault();
        var alternatif = $('#alternatif').val();
        if (alternatif!="") {
            $.ajax({
            type: 'post',
            url: '../datamodel.php?page=addalternatif',
            data: $('form').serialize(),
            success: function (pesan) {
                if(pesan=='Data Alternatif Berhasil Ditambahkan !!!'){
                swal({
                    title: "Sukses Menambahkan Alternatif",
                    icon: "success",
                    text: pesan,
                }).then((value) => {
                    $('#modalAdd').modal('hide');
                });
                tableDataAlternatif.ajax.reload();
                }else if(pesan=='Data Gagal Ditambahkan Silahkan Hubungi Admin/Developer !!!'){
                swal({
                    title: "Gagal Menambahkan Alternatif",
                    icon: "error",
                    text: pesan,
                });
                tableDataAlternatif.ajax.reload();
                }else{
                swal({
                    title: "Gagal !",
                    icon: "error",
                    text: pesan,
                });
                tableDataAlternatif.ajax.reload();
                }
            }
            });
        }
        });
            $('#formAddKriteria').on('submit', function (e) {
        e.preventDefault();
        var kriteria = $('#kriteria').val();
        var sifat = $('#sifat').val();
        var bobot = $('#bobot').val();
        if (kriteria!="" && sifat!="" && bobot!="") {
            $.ajax({
            type: 'post',
            url: '../datamodel.php?page=addkriteria',
            data: $('form').serialize(),
            success: function (pesan) {
                if(pesan=='Data Kriteria Berhasil Ditambahkan !!!'){
                swal({
                    title: "Sukses Menambahkan Kriteria",
                    icon: "success",
                    text: pesan,
                }).then((value) => {
                    $('#modalAdd').modal('hide');
                });
                tableDataKriteria.ajax.reload();
                }else if(pesan=='Data Gagal Ditambahkan Silahkan Hubungi Admin/Developer !!!'){
                swal({
                    title: "Gagal Menambahkan Bahan Baku",
                    icon: "error",
                    text: pesan,
                });
                tableDataKriteria.ajax.reload();
                }else{
                swal({
                    title: "Gagal !",
                    icon: "error",
                    text: pesan,
                });
                tableDataKriteria.ajax.reload();
                }
            }
            });
        }
        });
        $('#formEditKriteria').on('submit', function (e) {
      e.preventDefault();
      var idkriteria = $('#id_kriteria2').val();
      var kriteria = $('#kriteria2').val();
      var sifat = $('#sifat2').val();
      var bobot = $('#bobot2').val();
      if (idkriteria!="" && kriteria!="" && sifat!="" && bobot!="") {
          $.ajax({
          type: 'post',
          url: '../datamodel.php?page=editkriteria',
          data: $('form').serialize(),
          success: function (pesan) {
            if(pesan=='Berhasil Merubah Data Kriteria !'){
                swal({
                   title: "Sukses Merubah Data",
                   icon: "success",
                   text: pesan,
                }).then((value) => {
                    document.getElementById("formEditKriteria").reset();
                    tableDataKriteria.ajax.reload();
                    $('#modalEdit').modal('hide');
                });
            }else{
                swal({
                    title: "Gagal !",
                    icon: "error",
                    text: pesan,
                });
            }
          }
        });
      }
    });
    function deletekriteria(id){
        swal({
            title: "Apakah Anda Yakin?",
            text: "Anda Ingin Menghapus Data Kriteria Ini !?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
            var idx = id;
            // console.log(idx);
            $.ajax({
                url: '../datamodel.php?page=deletekriteria',
                type: 'POST',
                data: {
                'id': idx,
                },
                success: function (pesan) {
                if(pesan=='Data Berhasil Dihapus !!!'){
                    swal({
                        title: "Berhasil !",
                        icon: "success",
                        text: pesan
                    }).then(function() {
                        tableDataKriteria.ajax.reload();
                    });
                }else if(pesan=='Terjadi Kesalahan !!! Silahkan Hubungi Administrator'){
                    swal({
                        title: "WARNING !",
                        icon: "warning",
                        text: pesan
                    });
                }
                else{
                    swal({
                        title: "Gagal !",
                        icon: "error",
                        text: "Gagal Menghapus Data",
                    });
                }
            }
            });
        }
        });
    };
    $('#formAddNilai').on('submit', function (e) {
      e.preventDefault();
      $.ajax({
        type: 'post',
        enctype: 'multipart/form-data',
        url: '../datamodel.php?page=addnilai',
        data: new FormData(this),
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        success: function (pesan) {
          if(pesan=='Data Nilai Berhasil Ditambahkan !!!'){
            swal({
               title: "Sukses Menambahkan Nilai",
               icon: "success",
               text: pesan,
            }).then((value) => {
                $('#modalAdd').modal('hide');
            });
            
          }else if(pesan=='Data Gagal Ditambahkan Silahkan Hubungi Admin/Developer !!!'){
            swal({
                title: "Gagal Menambahkan Produk",
                icon: "error",
                text: pesan,
            });
            
          }else{
            swal({
                title: "Gagal !",
                icon: "error",
                text: pesan,
            });
            
          }
        }
      });
    });
        $('#formAddSubkriteria').on('submit', function (e) {
      e.preventDefault();
      $.ajax({
        type: 'post',
        enctype: 'multipart/form-data',
        url: '../datamodel.php?page=addsubkriteria',
        data: new FormData(this),
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        success: function (pesan) {
          if(pesan=='Data Subkriteria Berhasil Ditambahkan !!!'){
            swal({
               title: "Sukses Menambahkan Data Subkriteria",
               icon: "success",
               text: pesan,
            }).then((value) => {
                $('#modalAdd').modal('hide');
            });
            tableDataSubkriteria.ajax.reload();
          }else if(pesan=='Data Gagal Ditambahkan Silahkan Hubungi Admin/Developer !!!'){
            swal({
                title: "Gagal Menambahkan Subkriteria",
                icon: "error",
                text: pesan,
            });
            tableDataSubkriteria.ajax.reload();
          }else{
            swal({
                title: "Gagal !",
                icon: "error",
                text: pesan,
            });
            tableDataSubkriteria.ajax.reload();
          }
        }
      });
    });
        $('#formEditSubkriteria').on('submit', function (e) {
        e.preventDefault();
        var idsubkriteria = $('#id_subkriteria2').val();
        var subkriteria = $('#subkriteria2').val();
        var kriteria = $('#kriteria2').val();
        var sifat = $('#sifat2').val();
        var nilai = $('#nilai2').val();
        if (idsubkriteria!="" && subkriteria!="" && kriteria!="" && sifat!="" && nilai!="") {
            $.ajax({
            type: 'post',
            url: '../datamodel.php?page=editsubkriteria',
            data: $('form').serialize(),
            success: function (pesan) {
                if(pesan=='Berhasil Merubah Data Bahan Baku !'){
                    swal({
                    title: "Sukses Merubah Data",
                    icon: "success",
                    text: pesan,
                    }).then((value) => {
                        document.getElementById("formEditSubkriteria").reset();
                        tableDataSubkriteria.ajax.reload();
                        $('#modalEdit').modal('hide');
                    });
                }else{
                    swal({
                        title: "Gagal !",
                        icon: "error",
                        text: pesan,
                    });
                }
            }
            });
        }
        });
    function deletesubkriteria(id){
        swal({
            title: "Apakah Anda Yakin?",
            text: "Anda Ingin Menghapus Data Subkriteria Ini !?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
            var idx = id;
            // console.log(idx);
            $.ajax({
                url: '../datamodel.php?page=deletesubkriteria',
                type: 'POST',
                data: {
                'id': idx,
                },
                success: function (pesan) {
                if(pesan=='Data Berhasil Dihapus !!!'){
                    swal({
                        title: "Berhasil !",
                        icon: "success",
                        text: pesan
                    }).then(function() {
                        tableDataSubkriteria.ajax.reload();
                    });
                }else if(pesan=='Terjadi Kesalahan !!! Silahkan Hubungi Administrator'){
                    swal({
                        title: "WARNING !",
                        icon: "warning",
                        text: pesan
                    });
                }
                else{
                    swal({
                        title: "Gagal !",
                        icon: "error",
                        text: "Gagal Menghapus Data",
                    });
                }
            }
            });
        }
        });
    };
    function deletealternatif(id){
        swal({
            title: "Apakah Anda Yakin?",
            text: "Anda Ingin Menghapus Data Alternatif Ini !?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
            var idx = id;
            // console.log(idx);
            $.ajax({
                url: '../datamodel.php?page=deletealternatif',
                type: 'POST',
                data: {
                'id': idx,
                },
                success: function (pesan) {
                if(pesan=='Data Berhasil Dihapus !!!'){
                    swal({
                        title: "Berhasil !",
                        icon: "success",
                        text: pesan
                    }).then(function() {
                        tableDataAlternatif.ajax.reload();
                    });
                }else if(pesan=='Terjadi Kesalahan !!! Silahkan Hubungi Administrator'){
                    swal({
                        title: "WARNING !",
                        icon: "warning",
                        text: pesan
                    });
                }
                else{
                    swal({
                        title: "Gagal !",
                        icon: "error",
                        text: "Gagal Menghapus Data",
                    });
                }
                }
            });
            }
        });
    };


    </script>
</body>
</html>
