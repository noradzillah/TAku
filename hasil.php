<?php

include('config.php');
include('fungsi.php');


// menghitung perangkingan
$jmlKriteria 	= getJumlahKriteria();
$jmlAlternatif	= getJumlahAlternatif();
$nilai			= array();

// mendapatkan nilai tiap alternatif
for ($x=0; $x <= ($jmlAlternatif-1); $x++) {
	// inisialisasi
	$nilai[$x] = 0;

	for ($y=0; $y <= ($jmlKriteria-1); $y++) {
		$id_alternatif 	= getAlternatifID($x);
		$id_kriteria	= getKriteriaID($y);

		$pv_alternatif	= getAlternatifPV($id_alternatif,$id_kriteria);
		$pv_kriteria	= getKriteriaPV($id_kriteria);

		$nilai[$x]	 	+= ($pv_alternatif * $pv_kriteria);
	}
}

// update nilai ranking
for ($i=0; $i <= ($jmlAlternatif-1); $i++) {
	$id_alternatif = getAlternatifID($i);
	$query = "INSERT INTO hasil VALUES ($id_alternatif,$nilai[$i]) ON DUPLICATE KEY UPDATE value_hsl=$nilai[$i]";
	$result = mysqli_query($koneksi,$query);
	if (!$result) {
		echo "Gagal mengupdate ranking";
		exit();
	}
}

include('header.php');

?>

<section class="container" style="margin-bottom: 20px">
	<h3>Hasil Perhitungan</h3>
	<br>
	<div class="table-responsive">
		<table class="table table-stripped">
			<thead class="thead-dark" float="center">
			<tr>
				<th>Kriteria</th>
				<th>Nilai Eigen (rata-rata)</th>
				<?php
				for ($i=0; $i <= (getJumlahAlternatif()-1); $i++) {
					echo "<th>".getAlternatifNama($i)."</th>\n";
				}
				?>
			</tr>
			</thead>
			<tbody>

			<?php
				for ($x=0; $x <= (getJumlahKriteria()-1) ; $x++) {
					echo "<tr>";
					echo "<td>".getKriteriaNama($x)."</td>";
					echo "<td>".round(getKriteriaPV(getKriteriaID($x)),5)."</td>";

					for ($y=0; $y <= (getJumlahAlternatif()-1); $y++) {
						echo "<td>".round(getAlternatifPV(getAlternatifID($y),getKriteriaID($x)),5)."</td>";
					}


					echo "</tr>";
				}
			?>
			</tbody>

			<tfoot>
			<tr>
				<th colspan="2">Sum</th>
				<?php
				for ($i=0; $i <= ($jmlAlternatif-1); $i++) {
					echo "<th>".round($nilai[$i],5)."</th>";
				}
				?>
			</tr>
			</tfoot>

		</table>
	</div>


	

	
</section>

<?php include('footer.php');
 ?>