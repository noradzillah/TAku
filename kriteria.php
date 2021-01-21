<?php
	include('config.php');
	include('fungsi.php');

	// menjalankan perintah edit
	if(isset($_POST['edit'])) {
		$id = $_POST['id'];

		header('Location: edit.php?jenis=kriteria&id='.$id);
		exit();
	}

	// menjalankan perintah delete
	if(isset($_POST['delete'])) {
		$id = $_POST['id'];
		deleteKriteria($id);
	}

	// menjalankan perintah tambah
	if(isset($_POST['tambah'])) {
		$nama = $_POST['nama'];
		tambahData('kriteria',$nama);
	}

	include('header.php');

?>


<section class="content">
	<h3>KRITERIA</h3>
	<?php if (isset($_SESSION['login'])): ?>
	<a href="tambah.php?jenis=kriteria" class="btn btn-sm btn-info float-right" style="margin-bottom: 15px">
		<i class="fa fa-plus-square"></i> Tambah Kriteria
	</a>
	<?php endif; ?>
	
	<table class="table " id="table_id">
		<thead class="thead-dark">
			<tr>
				<th>No</th>
				<th>Nama Kriteria</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>

		<?php
			// Menampilkan list kriteria
			$query = "SELECT id_krit,nama_krit FROM kriteria ORDER BY id_krit";
			$result	= mysqli_query($koneksi, $query);

			$i = 0;
			while ($row = mysqli_fetch_array($result)) {
				$i++;
		?>
			<tr>
				<td><?php echo $i ?></td>
				<td><?php echo $row['nama_krit'] ?></td>
				<td>
					<?php if (isset($_SESSION['login'])): ?>
						<form method="post" action="kriteria.php">
							<input type="hidden" name="id" value="<?php echo $row['id_krit'] ?>">
							<button type="submit" name="edit" class="btn btn-sm btn-warning"><i class="fa fa-pencil-square-o"></i>EDIT</button>
							<button type="submit" name="delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
						</form>
					<?php endif; ?>
				</td>
			</tr>


	<?php } ?>
		</tbody>
	</table>


</section>


<?php include('footer.php'); ?>
