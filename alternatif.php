<?php
	include('config.php');
	include('fungsi.php');

	// menjalankan perintah edit
	if(isset($_POST['edit'])) {
		$id = $_POST['id'];

		header('Location: edit.php?jenis=alternatif&id='.$id);
		exit();
	}

	// menjalankan perintah delete
	if(isset($_POST['delete'])) {
		$id = $_POST['id'];
		deleteAlternatif($id);
	}

	// menjalankan perintah tambah
	if(isset($_POST['tambah'])) {
		$nama = $_POST['nama'];
		tambahData('alternatif',$nama);
	}

	include('header.php');
?>

<section class="content">
	<h3>ALTERNATIF</h3>
	<?php if (isset($_SESSION['login'])): ?>
	<a href="tambah.php?jenis=alternatif" class="btn btn-sm btn-info float-right" style="margin-bottom: 15px">
		<i class="fa fa-plus-square"></i> Tambah Alternatif
	</a>
	<?php endif; ?>

	<table class="ui celled table" id="table_id">
		<thead class="thead-dark">
			<tr>
				<th>No</th>
				<th>NIM</th>
				<th>Piagam</th>
				<th>IPK</th>
				<th>Organisasi</th>
				<th>Semester</th>
				<?php if (isset($_SESSION['login'])): ?>
				<th>Aksi</th>
				<?php endif; ?>
			</tr>
		</thead>
		<tbody>

		<?php
			// Menampilkan list alternatif
			$query = "SELECT id_alt,nim FROM alternatif ORDER BY id_alt";
			$result	= mysqli_query($koneksi, $query);

			$i = 0;
			while ($row = mysqli_fetch_array($result)) {
				$i++;
		?>
		<tr>
			<td><?php echo $i ?></td>
			<td><?php echo $row['nim'] ?></td>
			<?php
				$query = "SELECT detail_alternatif.*, kriteria.nama_krit FROM detail_alternatif INNER JOIN kriteria
									ON kriteria.id_krit=detail_alternatif.id_krit
									WHERE id_alt=".$row['id_alt']."";
				$results	= mysqli_query($koneksi, $query);

				while ($r = mysqli_fetch_array($results)){ ?>
					<?php
						$myArray[] = $r;
					?>
				<?php }

			//	$json = json_encode($myArray);

				$query = "SELECT detail_alternatif.*, kriteria.nama_krit FROM detail_alternatif INNER JOIN kriteria
									ON kriteria.id_krit=detail_alternatif.id_krit
									WHERE id_alt=".$row['id_alt'];
				$results	= mysqli_query($koneksi, $query);

				while ($r = mysqli_fetch_array($results)){ ?>
					<td><?php
						echo $r['value_alt'];
						?></td>
				<?php }
			?>
			<?php if (isset($_SESSION['login'])): ?>
			<td>
				<form method="post" action="alternatif.php">
					<input type="hidden" name="id" value="<?php echo $row['id_alt'] ?>">
					<button type="submit" name="edit" class="btn btn-sm btn-warning"><i class="fa fa-pencil-square-o"></i>EDIT</button>
					<button type="submit" name="delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
				</form>
			</td>
			<?php endif; ?>
		</tr>

<?php } ?>

		</tbody>
	</table>
	<br>

	<form action="bobot_kriteria.php">
		<button class="btn btn-outline-info" style="float: right;">
			Lanjut <i class="fa fa-angle-right"></i>
		</button>
	</form>
</section>

<?php include('footer.php'); ?>


