<?php

// mencari ID kriteria
// berdasarkan urutan ke berapa (C1, C2, C3)
function getKriteriaID($no_urut) {
	include('config.php');
	$query  = "SELECT id_krit FROM kriteria ORDER BY id_krit";
	$result = mysqli_query($koneksi, $query);

	while ($row = mysqli_fetch_array($result)) {
		$listID[] = $row['id_krit'];
	} 

	return $listID[($no_urut)];
}

// mencari ID alternatif
// berdasarkan urutan ke berapa (A1, A2, A3)
function getAlternatifID($no_urut) {
	include('config.php');
	$query  = "SELECT id_alt FROM alternatif ORDER BY id_alt";
	$result = mysqli_query($koneksi, $query);

	while ($row = mysqli_fetch_array($result)) {
		$listID[] = $row['id_alt'];
	}

	return $listID[($no_urut)];
}

// mencari nama kriteria
function getKriteriaNama($no_urut) {
	include('config.php');
	$query  = "SELECT nama_krit FROM kriteria ORDER BY id_krit";
	$result = mysqli_query($koneksi, $query);

	while ($row = mysqli_fetch_array($result)) {
		$nama[] = $row['nama_krit'];
	}

	return $nama[($no_urut)];
}

// mencari nama alternatif
function getAlternatifNama($no_urut) {
	include('config.php');
	$query  = "SELECT nim FROM alternatif ORDER BY id_alt";
	$result = mysqli_query($koneksi, $query);

	while ($row = mysqli_fetch_array($result)) {
		$nama[] = $row['nim'];
	}

	return $nama[($no_urut)];
}

// mencari priority vector alternatif
function getAlternatifPV($id_alternatif,$id_kriteria) {
	include('config.php');

	$pv = 1;
	$query = "SELECT value_spalt FROM sp_alternatif WHERE id_alt=$id_alternatif AND id_krit=$id_kriteria";
	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_array($result)) {
		$pv = $row['value_spalt'];
	}

	return $pv;
}

// mencari priority vector kriteria
function getKriteriaPV($id_kriteria) {
	include('config.php');
	$query = "SELECT value_spkrit FROM sp_kriteria WHERE id_krit=$id_kriteria";
	$result = mysqli_query($koneksi, $query);
	$pv=0;
	while ($row = mysqli_fetch_array($result)) {
		$pv = $row['value_spkrit'];
	}

	return $pv;
}

// mencari jumlah alternatif
function getJumlahAlternatif() {
	include('config.php');
	$query  = "SELECT count(*) FROM alternatif";
	$result = mysqli_query($koneksi, $query);
	$jumlahData = 0;
	while ($row = mysqli_fetch_array($result)) {
		$jumlahData = $row[0];
	}
	return $jumlahData;
}

// mencari jumlah kriteria
function getJumlahKriteria() {
	include('config.php');
	$query  = "SELECT count(*) FROM kriteria";
	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_array($result)) {
		$jumlahData = $row[0];
	}

	return $jumlahData;
}

function getKriteria(){
	include('config.php');
	$query  = "SELECT * FROM kriteria";
	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_array($result)) {
		$pv[] = $row;
	}

	return $pv;
}

// menambah data kriteria / alternatif
function tambahDataKriteria($tabel,$nama) {
	include('config.php');

	$query  = "SELECT * FROM kriteria WHERE nama_krit='".$nama."'";
	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_array($result)) {
		$alt = $row['nama_krit'];
	}

	if ($alt) {
		echo "Kriteria sudah digunakan!";
		exit();
	}

	$query 	= "INSERT INTO $tabel (nama_krit) VALUES ('".addslashes($nama)."')";
	$tambah	= mysqli_query($koneksi, $query);

	if (!$tambah) {
		echo "Gagal mmenambah data".$tabel;
		exit();
	}
}

function tambahDataAlternatif($nama, $kriteria){
	include('config.php');

	$query  = "SELECT * FROM alternatif WHERE nim='".$nama."'";
	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_array($result)) {
		$alt = $row['nim'];
	}

	if ($alt) {
		echo "Mahasiswa Sudah Terdaftar!";
		exit();
	}

	while ($row = mysqli_fetch_array($result)) {
		$alt = $row['id_alt'];
	}

	$query 	= "INSERT INTO alternatif (nim) VALUES ('$nama')";
	$tambah	= mysqli_query($koneksi, $query);

	$query  = "SELECT id_alt FROM alternatif ORDER BY id_alt DESC LIMIT 1";
	$result = mysqli_query($koneksi, $query);

	while ($row = mysqli_fetch_array($result)) {
		$alt = $row['id_alt'];
	}

	$query  = "SELECT * FROM kriteria";
	$kr = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_array($kr)) {
		$k[] = $row['id_krit'];
	}

	for ($i=0; $i < count($k); $i++) {
		$query 	= "INSERT INTO detail_alternatif (id_alt, id_krit, value_alt) VALUES ('$alt', '$k[$i]', '$kriteria[$i]')";
		$tambah	= mysqli_query($koneksi, $query);
	}

	if (!$tambah) {
		echo "Gagal mmenambah data".$tabel;
		exit();
	}
}

// hapus kriteria
function deleteKriteria($id) {
	include('config.php');

	// hapus record dari tabel kriteria
	$query 	= "DELETE FROM kriteria WHERE id_krit=$id";
	mysqli_query($koneksi, $query);

	// hapus record dari tabel pv_kriteria
	$query 	= "DELETE FROM sp_kriteria WHERE id_krit=$id";
	mysqli_query($koneksi, $query);

	// hapus record dari tabel pv_alternatif
	$query 	= "DELETE FROM sp_alternatif WHERE id_krit=$id";
	mysqli_query($koneksi, $query);

	$query 	= "DELETE FROM perbandingan_kriteria WHERE krit_utama=$id OR kritpembanding=$id";
	mysqli_query($koneksi, $query);

	$query 	= "DELETE FROM perbandingan_alternatif WHERE pembanding=$id";
	mysqli_query($koneksi, $query);
}

// hapus alternatif
function deleteAlternatif($id) {
	include('config.php');

	// hapus record dari tabel detail_alternatif
	$query 	= "DELETE FROM detail_alternatif WHERE id_alt=$id";
	mysqli_query($koneksi, $query);

	// hapus record dari tabel alternatif
	$query 	= "DELETE FROM alternatif WHERE id_alt=$id";
	mysqli_query($koneksi, $query);

	// hapus record dari tabel pv_alternatif
	$query 	= "DELETE FROM sp_alternatif WHERE id_alt=$id";
	mysqli_query($koneksi, $query);

	// hapus record dari tabel ranking
	$query 	= "DELETE FROM hasil WHERE id_alt=$id";
	mysqli_query($koneksi, $query);

	$query 	= "DELETE FROM perbandingan_alternatif WHERE alt_utama=$id OR alt_pembanding=$id";
	mysqli_query($koneksi, $query);
}

// memasukkan nilai priority vektor kriteria
function inputKriteriaPV ($id_kriteria,$pv) {
	include ('config.php');

	$query = "SELECT * FROM sp_kriteria WHERE id_krit=$id_kriteria";
	$result = mysqli_query($koneksi, $query);

	if (!$result) {
		echo "Error !!!";
		exit();
	}

	// jika result kosong maka masukkan data baru
	// jika telah ada maka diupdate
	if (mysqli_num_rows($result)==0) {
		$query = "INSERT INTO sp_kriteria (id_krit, value_spkrit) VALUES ($id_kriteria, $pv)";
	} else {
		$query = "UPDATE sp_kriteria SET value_spkrit=$pv WHERE id_krit=$id_kriteria";
	}


	$result = mysqli_query($koneksi, $query);
	if(!$result) {
		echo "Gagal memasukkan / update nilai priority vector kriteria";
		exit();
	}

}

// memasukkan nilai priority vektor alternatif
function inputAlternatifPV ($id_alternatif,$id_kriteria,$pv) {
	include ('config.php');

	$query  = "SELECT * FROM sp_alternatif WHERE id_alt = $id_alternatif AND id_krit = $id_kriteria";
	$result = mysqli_query($koneksi, $query);

	if (!$result) {
		echo "Error !!!";
		exit();
	}

	// jika result kosong maka masukkan data baru
	// jika telah ada maka diupdate
	if (mysqli_num_rows($result)==0) {
		$query = "INSERT INTO sp_alternatif (id_alt,id_krit,value_spalt) VALUES ($id_alternatif,$id_kriteria,$pv)";
	} else {
		$query = "UPDATE sp_alternatif SET value_spalt=$pv WHERE id_alt=$id_alternatif AND id_krit=$id_kriteria";
	}

	$result = mysqli_query($koneksi, $query);
	if (!$result) {
		echo "Gagal memasukkan / update nilai priority vector alternatif";
		exit();
	}

}


// memasukkan bobot nilai perbandingan kriteria
function inputDataPerbandinganKriteria($kriteria1,$kriteria2,$nilai) {
	include('config.php');

	$id_kriteria1 = getKriteriaID($kriteria1);
	$id_kriteria2 = getKriteriaID($kriteria2);

	$query  = "SELECT * FROM perbandingan_kriteria WHERE krit_utama = $id_kriteria1 AND krit_pembanding = $id_kriteria2";
	$result = mysqli_query($koneksi, $query);

	if (!$result) {
		echo "Error !!!";
		exit();
	}

	// jika result kosong maka masukkan data baru
	// jika telah ada maka diupdate
	if (mysqli_num_rows($result)==0) {
		$query = "INSERT INTO perbandingan_kriteria (krit_utama,krit_pembanding, value_krit) VALUES ($id_kriteria1,$id_kriteria2,$nilai)";
	} else {
		$query = "UPDATE perbandingan_kriteria SET value_krit=$nilai WHERE krit_utama=$id_kriteria1 AND krit_pembanding=$id_kriteria2";
	}

	$result = mysqli_query($koneksi, $query);
	if (!$result) {
		echo "Gagal memasukkan data perbandingan";
		exit();
	}

}

// memasukkan bobot nilai perbandingan alternatif
function inputDataPerbandinganAlternatif($alternatif1,$alternatif2,$pembanding,$nilai) {
	include('config.php');


	$id_alternatif1 = getAlternatifID($alternatif1);
	$id_alternatif2 = getAlternatifID($alternatif2);
	$id_pembanding  = getKriteriaID($pembanding);

	$query  = "SELECT * FROM perbandingan_alternatif WHERE alt_utama = $id_alternatif1 AND alt_pembanding = $id_alternatif2 AND pembanding = $id_pembanding";
	$result = mysqli_query($koneksi, $query);

	if (!$result) {
		echo "Error !!!";
		exit();
	}

	// jika result kosong maka masukkan data baru
	// jika telah ada maka diupdate
	if (mysqli_num_rows($result)==0) {
		$query = "INSERT INTO perbandingan_alternatif (alt_utama,alt_pembanding,pembanding,value_alt) VALUES ($id_alternatif1,$id_alternatif2,$id_pembanding,$nilai)";
	} else {
		$query = "UPDATE perbandingan_alternatif SET value_alt=$nilai WHERE alt_utama=$id_alternatif1 AND alt_pembanding=$id_alternatif2 AND pembanding=$id_pembanding";
	}

	$result = mysqli_query($koneksi, $query);
	if (!$result) {
		echo "Gagal memasukkan data perbandingan";
		exit();
	}

}

// mencari nilai bobot perbandingan kriteria
function getNilaiPerbandinganKriteria($kriteria1,$kriteria2) {
	include('config.php');

	$id_kriteria1 = getKriteriaID($kriteria1);
	$id_kriteria2 = getKriteriaID($kriteria2);

	$query  = "SELECT value_krit FROM perbandingan_kriteria WHERE krit_utama = $id_kriteria1 AND krit_pembanding = $id_kriteria2";
	$result = mysqli_query($koneksi, $query);

	if (!$result) {
		echo "Error !!!";
		exit();
	}

	if (mysqli_num_rows($result)==0) {
		$nilai = 1;
	} else {
		while ($row = mysqli_fetch_array($result)) {
			$nilai = $row['value_krit'];
		}
	}

	return $nilai;
}

// mencari nilai bobot perbandingan alternatif
function getNilaiPerbandinganAlternatif($alternatif1,$alternatif2,$pembanding) {
	include('config.php');

	$id_alternatif1 = getAlternatifID($alternatif1);
	$id_alternatif2 = getAlternatifID($alternatif2);
	$id_pembanding  = getKriteriaID($pembanding);

	$query  = "SELECT value_alt FROM perbandingan_alternatif WHERE alt_utama = $id_alternatif1 AND alt_pembanding = $id_alternatif2 AND pembanding = $id_pembanding";
	$result = mysqli_query($koneksi, $query);

	if (!$result) {
		echo "Error !!!";
		exit();
	}
	if (mysqli_num_rows($result)==0) {
		$nilai = 1;
	} else {
		while ($row = mysqli_fetch_array($result)) {
			$nilai = $row['value_alt'];
		}
	}

	return $nilai;
}

// menampilkan nilai IR
function getNilaiIR($jmlKriteria) {
	include('config.php');
	$query  = "SELECT nilai FROM ind_ratio WHERE jumlah=$jmlKriteria";
	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_array($result)) {
		$nilaiIR = $row['nilai'];
	}

	return $nilaiIR;
}

// mencari Principe Eigen Vector (λ maks)
function getEigenVector($matrik_a,$matrik_b,$n) {
	$eigenvektor = 0;
	for ($i=0; $i <= ($n-1) ; $i++) {
		$eigenvektor += ($matrik_a[$i] * (($matrik_b[$i]) / $n));
	}

	return $eigenvektor;
}

// mencari Cons Index
function getConsIndex($matrik_a,$matrik_b,$n) {
	$eigenvektor = getEigenVector($matrik_a,$matrik_b,$n);
	$consindex = ($eigenvektor - $n)/($n-1);

	return $consindex;
}

// Mencari Consistency Ratio
function getConsRatio($matrik_a,$matrik_b,$n) {
	$consindex = getConsIndex($matrik_a,$matrik_b,$n);
	$consratio = $consindex / getNilaiIR($n);

	return $consratio;
}

function showTabelPerbandinganBobotKriteria($jenis,$kriteria) {
	include('config.php');

	if ($kriteria == 'kriteria') {
		$n = getJumlahKriteria();
	} else {
		$n = getJumlahAlternatif();
	}

	$query = "SELECT nama_krit FROM $kriteria ORDER BY id_krit";
	$result	= mysqli_query($koneksi, $query);
	if (!$result) {
		echo "Error koneksi database!!!";
		exit();
	}

	// buat list nama pilihan
	while ($row = mysqli_fetch_array($result)) {
		$pilihan[] = $row['nama_krit'];
	}

	// tampilkan tabel
	?>

	<form class="col-md-8" action="proses.php" method="post" name="submitform">
	<table class="table table-stripped">
		<thead class="thead-dark">
			<tr>
				<th colspan="2">Tentukan Prioritas</th>
				<th>Poin Perbandingan</th>
			</tr>
		</thead>
		<tbody>

	<?php

	//inisialisasi
	$urut = 0;

	for ($x=0; $x <= ($n - 2); $x++) {
		for ($y=($x+1); $y <= ($n - 1) ; $y++) {

			$urut++;

	?>
			<tr>
				<td>
					<input name="pilih<?php echo $urut?>" value="1" checked="" class="hidden" type="radio">
					<label><?php echo $pilihan[$x]; ?></label>
				</td>
				<td>
					<input name="pilih<?php echo $urut?>" value="2" class="hidden" type="radio">
					<label><?php echo $pilihan[$y]; ?></label>
				</td>
				<td>
					<div class="field">

	<?php
	if ($kriteria == 'kriteria') {
		$nilai = getNilaiPerbandinganKriteria($x,$y);
	} else {
		$nilai = getNilaiPerbandinganAlternatif($x,$y,($jenis-1));
	}

	?>
					<input class="form-control" type="number" name="bobot<?php echo $urut?>" value="<?php echo $nilai?>" max="9" min="0" step="0.00000001" required>		
					</div>
				</td>
			</tr>
			<?php
		}
	}

	?>
		</tbody>
	</table>
	<input type="text" name="jenis" value="<?php echo $jenis; ?>" hidden>
	<input class="btn btn-outline-info" type="submit" name="submit" value="Submit" id="btnSubmit">
	</form>

	<?php
}

// menampilkan tabel perbandingan bobot
function showTabelPerbandingan($jenis,$kriteria) {
	include('config.php'); 

	if ($kriteria == 'kriteria') {
		$n = getJumlahKriteria();
	} else {
		$n = getJumlahAlternatif();
	}
//memanggil data dari database
	$query = "SELECT nim FROM $kriteria ORDER BY id_alt";
	$result	= mysqli_query($koneksi, $query);
	if (!$result) {
		echo "Error koneksi database!!!";
		exit();
	}

	// buat list nama pilihan
	while ($row = mysqli_fetch_array($result)) {
		$pilihan[] = $row['nim'];
	}

	// tampilkan tabel
	?>

	<form class="col-md-8" action="proses.php" method="post">
	<table class="table table-stripped">
		<thead class="thead-dark">
			<tr>
				<th colspan="2">Tentukan Prioritas</th>
				<th>Poin Perbandingan</th>
			</tr>
		</thead>
		<tbody>

	<?php

	//inisialisasi dg perulangan
	$urut = 0;

	for ($x=0; $x <= ($n - 2); $x++) {
		for ($y=($x+1); $y <= ($n - 1) ; $y++) {

			$urut++;

	?>
			<tr>
				<td>
					<input name="pilih<?php echo $urut?>" value="1" checked="" class="hidden" type="radio">
					<label><?php echo $pilihan[$x]; ?></label>
				</td>
				<td>
					<input name="pilih<?php echo $urut?>" value="2" class="hidden" type="radio">
					<label><?php echo $pilihan[$y]; ?></label>
				</td>
				<td>
					<div class="field">

					<?php
					if ($kriteria == 'kriteria') {
						$nilai = getNilaiPerbandinganKriteria($x,$y);
					} else {
						$nilai = getNilaiPerbandinganAlternatif($x,$y,($jenis-1));
					}

					?>
					<input class="form-control" type="number" name="bobot<?php echo $urut?>" value="<?php echo $nilai?>" max="9" min="0" step="0.00000001" required>
					</div>
				</td>
			</tr>
			<?php
		}
	}

	?>
		</tbody>
	</table>
	<input type="text" name="jenis" value="<?php echo $jenis; ?>" hidden>
	<input class="btn btn-outline-info" id="btnSubmit" type="submit" name="submit" value="Submit">
	</form>
	<?php
		$query = "SELECT detail_alternatif.*, alternatif.nim, kriteria.nama_krit as kriteria FROM detail_alternatif
							INNER JOIN alternatif ON alternatif.id_alt=detail_alternatif.id_alt
							INNER JOIN kriteria ON kriteria.id_krit=detail_alternatif.id_krit
							WHERE detail_alternatif.id_krit='".getKriteriaID($jenis-1)."'";
		$result	= mysqli_query($koneksi, $query);
		$info=[];
		while ($row = mysqli_fetch_array($result)) {
			$info[] = $row;
		}

		$json = json_encode($info);
	?>
	
		<div class="col-md-4"> 
		<h4>Lihat Data</h4>
			<div class="accordion" id="accordionExample">
				<?php $no=0 ?>
				<?php foreach ($info as $key): ?>
				<div class="card">
					<div class="card-header" >
						<h2 class="mb-0">
							<button class="btn btn-outline-info" type="button" data-toggle="collapse" data-target="#collapseOne<?= $no ?>" aria-expanded="true" aria-controls="collapseOne">
								<?= $key['nim'] ?>
							</button>
						</h2>
					</div>

					<div id="collapseOne<?= $no ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
						<div class="card-body">
						<?= $key['value_alt'] ?>
						</div>
					</div>
				</div>
				<?php $no++ ?>
				<?php endforeach; ?>
			</div>
		</div>
	</table>

	
	<?php
}

function login(){
	include('config.php');

	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$query  = "SELECT * FROM user WHERE username='".$username."' AND password='".$password."'";
	$result = mysqli_query($koneksi, $query);
	$result = $result->fetch_assoc();

	if ($result) {

		session_start();
		$_SESSION['login'] = true;
		$_SESSION['data'] = $result;

		if ($result['role'] == "1") {
			header('Location: index.php');
		}else {
			header('Location: index.php');
		}
	}else {
		header('Location: '.$_SERVER['REQUEST_URI'].'?message=Username atau password kamu salah!');
	}
}

function register(){
	include('config.php');

	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$confirm_password = md5($_POST['confirm_password']);

	if ($password != $confirm_password) {
		header('Location: '.$_SERVER['REQUEST_URI'].'?message=Konfirmasi password tidak sesuai!');
	}

	$query  = "SELECT * FROM user WHERE username='".$username."'";
	$result = mysqli_query($koneksi, $query);
	$result = $result->fetch_assoc();

	if ($result) {
		header('Location: '.$_SERVER['REQUEST_URI'].'?message=Username sudah digunakan!');
	}else {
		$query 	= "INSERT INTO user (username, password) VALUES ('".$username."', '".$password."')";
		$tambah	= mysqli_query($koneksi, $query);

		if ($tambah) {
			$query  = "SELECT * FROM user WHERE username='".$username."'";
			$result = mysqli_query($koneksi, $query);
			$result = $result->fetch_assoc();
		}else {
			header('Location: '.$_SERVER['REQUEST_URI'].'?message=Gagal menambah data');
		}

		session_start();
		$_SESSION['login'] = true;
		$_SESSION['data'] = $result;

		if ($result['role'] == "1") {
			header('Location: index.php');
		}else {
			header('Location: index.php');
		}
	}
}

?>
