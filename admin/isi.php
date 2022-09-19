<?php 
error_reporting(0);
#beranda
if ($_GET['mod']=='dashboard') {
	include 'dashboard.php';
}

#DATA DATA
elseif ($_GET['mod']=='alternatif') {
	include 'alternatif.php';
}
elseif ($_GET['mod']=='kriteria') {
	include 'kriteria.php';
}
elseif ($_GET['mod']=='subkriteria') {
	include 'subkriteria.php';
}
elseif ($_GET['mod']=='hitung') {
	include 'hitung.php';
}
elseif ($_GET['mod']=='hasil') {
	include 'hasil.php';
}
elseif ($_GET['mod']=='datakaryawan') {
	include 'datakaryawan.php';
}
elseif ($_GET['mod']=='datalogin') {
	include 'datalogin.php';
}
elseif ($_GET['mod']=='ubah') {
	include 'ubahpass.php';
}
else{
	include 'dashboard.php';
}

?>