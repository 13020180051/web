<?php
    if(file_exists('koneksi.php')){
        include 'koneksi.php';
        error_reporting(0);
        session_start();
        if(isset($_GET['page'])){
            if($_GET['page']=="proseslogin"){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $query = mysqli_query ($con, "SELECT * FROM pengguna WHERE username='$username' AND password='$password'");
                if(mysqli_num_rows($query)==1){//jika berhasil akan bernilai 1
                    $c = mysqli_fetch_array($query);
                    $_SESSION['username'] = $c['username'];
                    $_SESSION['status'] = $c['status'];
                    if($c['status']=="admin"){
                        $_SESSION['iduser'] = $c['id_user'];
                        echo "Berhasil Login Sebagai Administrator";
                    }
                    else if($c['status']=="user"){
                        $_SESSION['iduser'] = $c['id_user'];
                          echo "Berhasil Login Sebagai User";
                    }else{
                        echo "Akun Anda Tidak Terdaftar";
                    }
                }else{
                    exit();
                }
            }else if($_GET['page']=="alternatif"){
                    $x=0;
                    $query = mysqli_query ($con, "SELECT * FROM tb_alternatif");
                    while($row = mysqli_fetch_assoc($query)){
                        $jsonArray['data'][$x]=$row;
                        $x++;
                    }
                    echo json_encode($jsonArray);
            }else if($_GET['page']=="subkriteria"){
                $jsonArray=NULL;
                $query = mysqli_query ($con, "SELECT tb_subkriteria.id_subkriteria,tb_kriteria.kriteria,tb_subkriteria.subkriteria,tb_subkriteria.sifat,tb_subkriteria.nilai FROM tb_subkriteria INNER JOIN tb_kriteria ON tb_kriteria.id_kriteria=tb_subkriteria.id_kriteria");
                $x=0;
                while($row = mysqli_fetch_assoc($query)){
                    $jsonArray['data'][$x]=$row;
                        $x++;
                    
                }
                echo json_encode($jsonArray);
            }
            else if($_GET['page']=="kriteria"){
                $x=0;
                $query = mysqli_query ($con, "SELECT * FROM tb_kriteria");
                $jml_kriteria = mysqli_num_rows($query);
                while($row = mysqli_fetch_assoc($query)){
                    $jsonArray['data'][$x]=$row;
                    $x++;
                }
                echo json_encode($jsonArray);
            }else if($_GET['page']=="datalogin"){
                $x=0;
                $query = mysqli_query ($con, "SELECT * FROM user WHERE username!='admin'");
                while($row = mysqli_fetch_assoc($query)){
                    $jsonArray['data'][$x]=$row;
                    $jsonArray['data'][$x]['password']=md5($row['password']);
                    $x++;
                }
                echo json_encode($jsonArray);
            }else if($_GET['page']=="datakaryawan"){
                $x=0;
                $query = mysqli_query ($con, "SELECT * FROM tb_karyawan WHERE username!='admin'");
                while($row = mysqli_fetch_assoc($query)){
                    $jsonArray['data'][$x]=$row;
                    if($jsonArray['data'][$x]['jk']=="L"){
                        $jsonArray['data'][$x]['jk']="Laki-Laki";
                    }else if($jsonArray['data'][$x]['jk']=="P"){
                        $jsonArray['data'][$x]['jk']="Perempuan";
                    }
                    $x++;
                }
                echo json_encode($jsonArray);
            }else if($_GET['page']=="addkriteria"){
                $qidkomp = mysqli_query($con, "SELECT * from tb_kriteria ORDER BY id_kriteria DESC");
                $baris = mysqli_fetch_array($qidkomp);
                if (mysqli_num_rows($qidkomp)==0){
                  $id_kriteria = "C";
                }
                $id_kriteria = $_POST["id_kriteria"];
                $kriteria  = $_POST["kriteria"];
                $sifat  = $_POST["sifat"];
                $bobot = $_POST["bobot"];

                
                $tambah             = mysqli_query($con, "INSERT INTO tb_kriteria VALUES('$id_kriteria','$kriteria','$sifat','$bobot')");
                if($tambah){
                  echo "Data Kriteria Berhasil Ditambahkan !!!";
                }else{
                  echo "Data Gagal Ditambahkan Silahkan Hubungi Admin/Developer !!!";
                  exit();
                }
            }else if($_GET['page']=="addalternatif"){
                $qidkomp = mysqli_query($con, "SELECT * from tb_alternatif ORDER BY id_alternatif DESC");
                $baris = mysqli_fetch_array($qidkomp);
                if (mysqli_num_rows($qidkomp)==0){
                    $id_alternatif = "1";
                }
                
                $id_alternatif = $_POST["id_alternatif"];
                $alternatif  = $_POST["alternatif"];
               
                $tambah             = mysqli_query($con, "INSERT INTO tb_alternatif VALUES('$id_alternatif','$alternatif')");
                if($tambah){
                  echo "Data Alternatif Berhasil Ditambahkan !!!";
                }else{
                  echo "Data Gagal Ditambahkan Silahkan Hubungi Admin/Developer !!!";
                  exit();
                }
                
            } else if($_GET['page']=="addnilai"){
                $qidkomp = mysqli_query($con, "SELECT * from tb_nilai ORDER BY id_nilai DESC");
                $baris = mysqli_fetch_array($qidkomp);
                if (mysqli_num_rows($qidkomp)==0){
                    $id_nilai = "Z";
                  }
                $id_nilai =$_POST["id_nilai"];
                $id_alternatif =$_POST["id_alternatif"];
                $id_kriteria = $_POST["id_kriteria"];
                $nilai   = $_POST["nilai"];
                
                $tambah          = mysqli_query($con, "INSERT INTO tb_nilai VALUES('$id_nilai','$id_alternatif','$id_kriteria','$nilai')");
                
                    if($tambah){
                      echo "Data Nilai Berhasil Ditambahkan !!!";
                    }else{
                        
                      echo "Data Gagal Ditambahkan Silahkan Hubungi Admin/Developer !!!";
                    }
            
            }else if($_GET['page']=="addsubkriteria"){
                $qidkomp = mysqli_query($con, "SELECT * from tb_subkriteria ORDER BY id_subkriteria DESC");
                $baris = mysqli_fetch_array($qidkomp);
                if (mysqli_num_rows($qidkomp)==0){
                    $id_subkriteria = "Y";
                  }
                $id_subkriteria =$_POST["id_subkriteria"];
                $id_kriteria = $_POST["id_kriteria"];
                $subkriteria  = $_POST["subkriteria"];
                $sifat = $_POST["sifat"];
                $nilai   = $_POST["nilai"];
                
                $tambah          = mysqli_query($con, "INSERT INTO tb_subkriteria VALUES('$id_subkriteria','$id_kriteria','$subkriteria','$sifat','$nilai')");
                
                    if($tambah){
                      echo "Data Subkriteria Berhasil Ditambahkan !!!";
                    }else{
                        
                      echo "Data Gagal Ditambahkan Silahkan Hubungi Admin/Developer !!!";
                    }
                  
                
            }else if($_GET['page']=="editkriteria"){
                $idkriteria=$_POST['id_kriteria2'];
                $kriteria  = $_POST["kriteria2"];
                $sifat = $_POST["sifat2"];
                $bobot = $_POST["bobot2"];
                $query = mysqli_query ($con, "SELECT * FROM tb_kriteria WHERE id_kriteria='$idkriteria'");
                if(mysqli_num_rows($query)==1){
                  $update = mysqli_query ($con, "UPDATE tb_kriteria SET kriteria='$kriteria',sifat='$sifat',bobot='$bobot' WHERE id_kriteria='$idkriteria'");
                  if($update){
                    echo "Berhasil Merubah Data Kriteria !";
                  }
                }else{
                  echo "ID Bahan Baku Tidak Di Temukan!";
                }
            }else if($_GET['page']=="editsubkriteria"){
                $idsubkriteria=$_POST['id_subkriteria2'];
                $subkriteria  = $_POST["subkriteria2"];
                $kriteria = $_POST["kriteria2"];
                $sifat = $_POST["sifat2"];
                $nilai = $_POST["nilai2"];
                $query = mysqli_query ($con, "SELECT * FROM tb_subkriteria WHERE id_subkriteria='$idsubkriteria'");
                if(mysqli_num_rows($query)==1){
                  $update = mysqli_query ($con, "UPDATE tb_subkriteria SET subkriteria='$subkriteria',kriteria='$kriteria',sifat='$sifat',nilai='$nilai' WHERE id_subkriteria='$idsubkriteria'");
                  if($update){
                    echo "Berhasil Merubah Data Subkriteria !";
                  }
                }else{
                  echo "ID Subkriteria Tidak Di Temukan!";
                }
            }else if($_GET['page']=="deletesubkriteria"){
                $id=$_POST['id'];
                $query = mysqli_query ($con, "DELETE FROM tb_subkriteria WHERE id_subkriteria='$id'");
                if($query){
                    echo "Data Berhasil Dihapus !!!";
                }else{
                    echo "Terjadi Kesalahan !!! Silahkan Hubungi Administrator";
                }
            }else if($_GET['page']=="deletekaryawan"){
                $id=$_POST['id'];
                $query = mysqli_query ($con, "DELETE FROM user WHERE id_user='$id'");
                if($query){
                    echo "Data Berhasil Dihapus !!!";
                }else{
                    echo "Terjadi Kesalahan !!! Silahkan Hubungi Administrator";
                }
            }else if($_GET['page']=="deletekriteria"){
                $id=$_POST['id'];
                $query = mysqli_query ($con, "DELETE FROM tb_kriteria WHERE id_kriteria='$id'");
                if($query){
                    echo "Data Berhasil Dihapus !!!";
                }else{
                    echo "Terjadi Kesalahan !!! Silahkan Hubungi Administrator";
                }
            }else if($_GET['page']=="deletealternatif"){
                $id=$_POST['id'];
                $query = mysqli_query ($con, "DELETE FROM tb_alternatif WHERE id_alternatif='$id'");
                if($query){
                    echo "Data Berhasil Dihapus !!!";
                }else{
                    echo "Terjadi Kesalahan !!! Silahkan Hubungi Administrator";
                }
            }else if($_GET['page']=="resetuser"){
                $id=$_POST['id'];
                $username=$_POST['username'];
                $query = mysqli_query ($con, "UPDATE user SET password='$username' WHERE id_karyawan='$id'");
                if($query){
                    echo "Data Berhasil Direset !!!";
                }else{
                    echo "Terjadi Kesalahan !!! Silahkan Hubungi Administrator";
                }
            }else if($_GET['page']=="prosesubahpass"){
                $idcustomer = $_SESSION['username'];
                $password1 = $_POST['plama'];
                $pbaru = $_POST['pbaru'];
                $pbaru2 = $_POST['repbaru'];
                $query = mysqli_query($con, "SELECT * FROM pengguna WHERE username='$idcustomer' AND password='$password1'");
                if (mysqli_num_rows($query)==1){
                    if($pbaru!=$pbaru2){
                        echo "Password Baru Tidak Sama !!!";
                    }
                    else{
                        $update = mysqli_query($con, "UPDATE pengguna SET password='$pbaru' WHERE username='$idcustomer'");
                        if($update){
                            echo "Password Berhasil Di Ubah !!!";
                        }else{
                            echo "Terjadi Kesalahan !!! Gagal Merubah Password, Silahkan Hubungi Administrator";
                        }
                    }
                }else{
                    echo "Terjadi Kesalahan !!! Password Lama Salah, Silahkan Hubungi Administrator";
                }
            }
        }
    }
?>