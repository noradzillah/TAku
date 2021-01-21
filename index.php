
<?php
include('config.php');
include('fungsi.php');

// header
include('header.php');
?>
	<section class="content">
			<h2 class="ui header">Sistem Pendukung Keputusan Mahasiswa Berprestasi Tahunan </h2>

			<p>Sistem Pendukung Keputusan Mahasiswa Berprestasi Tahunan pada Jurusan Sistem Informasi ini dilakukan dengan menggunakan metode Analytical Hierarchy Process (AHP). Menggunakan  kriteria; IPK, Piagam Prestasi, Keterlibatan Organisasi, dan Posisi Semester. Untu dapat dibandingkan, dan mendapatkan data secara kongkrit, berikut nilai poin untuk setiap level dari prestasti (sertifikat) dan organisasi.</p>
			
			
			<h5 class="ui ">Nilai Poin Untuk Setiap Tingkat Prestasti (Piagam)</h5>
			<div class="container" >
			<div class="col-md-8">
			<div class="card">
				

			<table class="table" width="50%">
				<thead class="thead-dark">
					<tr>
						<th width="50%">Tingkat Prestasi</th>
						<th width="50%">Poin</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Internasional</td>
						<td>3</td>
					</tr>
					<tr>
						<td class="center aligned">Nasional</td>
						<td>2</td>
					</tr>
					<tr>
						<td class="center aligned">Unand/Lokal</td>
						<td>1</td>
					</tr>
				</tbody>
			</table>
			</div>
			</div>
			</div>
			
			
			<br>

			<h5 class="ui ">Nilai Poin Untuk Setiap Tingkat Organisasi</h5>
			<div class="container" >
			<div class="col-md-8">
			<div class="card">
		
			<table class="table" width="100%"> 
				<thead class="thead-dark">
					<tr>
						<th  width="50%">Posisi pada Organisasi</th>
						<th  width="50%">Poin</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Ketua</td>
						<td>3</td>
					</tr>
					<tr>
						<td class="center aligned">Presidium (wakil, sekretaris, bendahara, kabid)</td>
						<td>2</td>
					</tr>
					<tr>
						<td class="center aligned">Anggota</td>
						<td>1</td>
					</tr>
				</tbody>
			</table>
			</div>
			</div>
			</div>
		
		
	</section>

<?php include('footer.php'); ?>
