<?php
	
	$konek = mysqli_connect("localhost", "root", "", "web_pariwisata");

	if(mysqli_connect_errno()){
   echo "Koneksi Ke Server Gagal";
   exit();
	/*if (!$konek) {
		echo "Error: Tidak konek ke mysql" . PHP_EOL;
		echo "Error kok" . mysqli_connect_error() . PHP_EOL;
	}*/

  }
	//echo "Koneksi Berhasil" . PHP_EOL;
	//echo "information : " . mysqli_get_host_info($konek) . PHP_EOL;
 //mysqli_close();
?>