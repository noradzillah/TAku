<?php

include('config.php');
include('fungsi.php');
include('header.php');
?>
<html>
<body >
<h3>Tabel Ranking</h3>
	<div class="table-responsive">
		<table class="table table-stripped">
			<thead class="thead-dark">
				<tr>
					<th>Ranking</th>
					<th>NIM</th>
					<th>Nama Mahasiswa</th>
					<th>Poin</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$query  = "SELECT alternatif.id_alt,alternatif.nim,mahasiswa.nama_mhs,value_hsl 
					FROM alternatif JOIN hasil ON alternatif.id_alt=hasil.id_alt 
					JOIN mahasiswa ON alternatif.nim=mahasiswa.nim ORDER BY value_hsl DESC limit 3";
					$result = mysqli_query($koneksi, $query);

					$i = 0;
					while ($row = mysqli_fetch_array($result)) {
						$i++;
					?>
					<tr >
						<td><?= $i ?></td>
						<td><?php echo $row['nim'] ?></td>
						<td><?php echo $row['nama_mhs'] ?></td>
						<td><?php echo $row['value_hsl'] ?></td>
					</tr>

					<?php
					}


				?>
			</tbody>
		</table>
	</div>
	<br>
	<br>
<h4 style="font-family:verdana">Rekomendasi</h4>
	<div style="font-family:verdana">Berdasarkan hasil dari data yang telah diinputkan, maka rekomendasi mahasiswa berprestasi tahun ini adalah 
        <?php

        $query  = "SELECT alternatif.id_alt,alternatif.nim,mahasiswa.nama_mhs,value_hsl 
		FROM alternatif JOIN hasil ON alternatif.id_alt=hasil.id_alt 
		JOIN mahasiswa ON alternatif.nim=mahasiswa.nim ORDER BY value_hsl DESC limit 1";
					$result = mysqli_query($koneksi, $query);
					$row = mysqli_fetch_array($result);
					?>
        <?php if(is_array($row)) {?>
			<?php echo $row['nama_mhs']?>.
			<br>
			<br>
			Dengan data prestasi :
			<?php $query = "SELECT * FROM detail_alternatif,hasil WHERE detail_alternatif.id_alt = hasil.id_alt  ORDER BY value_hsl DESC limit 4";  
			$result = mysqli_query($koneksi, $query);
			$row = mysqli_fetch_array($result);
			?>			
			<?php echo $row['value_alt']  ?>
		<?php } ?>
        <br>
        <br>
        <br>

</body>		
</html>
<?php include('footer.php');
 ?>
        
