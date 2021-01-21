<?php
	include('config.php');
	include('fungsi.php');
	$kriteria = getKriteria();


	// mendapatkan data edit
	if(isset($_GET['jenis']) && isset($_GET['id'])) {
		$id 	= $_GET['id'];
		$jenis	= $_GET['jenis'];
		if($jenis=='alternatif'){
			$query 	= "SELECT nim FROM $jenis WHERE id_alt=$id";
			$result	= mysqli_query($koneksi, $query);

			while ($row = mysqli_fetch_array($result)) {
			$nama = $row['nim'];
		}
		}
		elseif($jenis=='kriteria'){
			$query 	= "SELECT nama_krit FROM $jenis WHERE id_krit=$id";
			$result	= mysqli_query($koneksi, $query);

			while ($row = mysqli_fetch_array($result)) {
			$nama = $row['nama_krit'];
		}
		}
	}

	if (isset($_POST['update'])) {
		$id 	= $_POST['id_krit'];
		$jenis	= $_POST['jenis'];
		$nama 	= $_POST['nama'];
		$kriterias = $_POST['kriteria'];

		$query 	= "UPDATE $jenis SET nama_krit='$nama' WHERE id_krit=$id";
		$result	= mysqli_query($koneksi, $query);

		if ($jenis == 'alternatif') {
			$query  = "SELECT * FROM kriteria";
			$kr = mysqli_query($koneksi, $query);
			while ($row = mysqli_fetch_array($kr)) {
				$k[] = $row['id_krit'];
			}

			//updae-------------------
			for ($i=0; $i < count($k); $i++) {
				$query 	= "UPDATE detail_alternatif SET value_alt='".addslashes($kriterias[$i])."' WHERE id_alt=".$id." AND id_krit=".$k[$i];
				$tambah	= mysqli_query($koneksi, $query);
			}
		}

		if (!$result) {
			echo "Update gagal";
			exit();
		} else {
			header('Location: '.$jenis.'.php');
			exit();
		}
	}

	include('header.php');
?>

<section class="content">
	<h3> Edit <?php echo $jenis ?></h3><br>

	<form class="col-md-12" method="post" action="edit.php">
		<div class="form-group">
			<label> Nama <?php echo $jenis ?></label>
			<input type="text" name="nama" class="form-control" value="<?php echo $nama?>">
			<input type="hidden" name="id" value="<?php echo $id?>">
			<input type="hidden" name="jenis" value="<?php echo $jenis?>">
		</div>

		<?php if ($jenis != 'kriteria'): ?>
			<?php foreach ($kriteria as $key): ?>
			<?php
				$query  = "SELECT * FROM detail_alternatif WHERE id_alt=".$id." AND id_krit=".$key['id_krit'];
				$kr = mysqli_query($koneksi, $query);

				while ($row = mysqli_fetch_array($kr)) {
					$k = $row['value_alt'];
				}
			?>
			<div class="form-group">
				<label><?= $key['nama_krit'] ?></label>
				<textarea type="text" name="kriteria[]" class="form-control
					<?= ($key['nama_krit'] == 'Jumlah Poin Piagam' || $key['nama_krit'] == 'Jumlah Poin Organisasi') ? 'summernote' : '' ?>"><?= isset($k) ? $k : '' ?></textarea>
			</div>
			<?php endforeach; ?>
		<?php endif; ?>

		<input class="btn btn-outline-info form-control" type="submit" name="update" value="UPDATE">
	</form>
</section>

<?php include('footer.php'); ?>

<!-- Summernote -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	$('.summernote').summernote({
		dialogsInBody: true,
		height: 200,
		toolbar: [
			['style', ['style']],
			['font', ['bold', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
			['fontname', ['fontname']],
			['color', ['color']],
			['fontsize', ['fontsize']],
			['para', ['ul', 'ol', 'paragraph']],
			['height', ['height']],
			['table', ['table']],
			['insert', ['link', 'picture', 'video']],
			['view', ['codeview', 'help']],
		]
	});
});
</script>
