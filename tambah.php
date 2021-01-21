<?php
	include('config.php');
	include('fungsi.php');
	$kriteria = getKriteria();

	// mendapatkan data edit
	if(isset($_GET['jenis'])) {
		$jenis	= $_GET['jenis'];
	}

	if (isset($_POST['tambah'])) {
		$jenis	= $_POST['jenis'];
		$nama 	= $_POST['nama'];

		if ($jenis == 'kriteria') {
			tambahDataKriteria($jenis,$nama);
		}else {
			tambahDataAlternatif($nama, $_POST['kriteria']);
		}

		header('Location: '.$jenis.'.php');
	}

	include('header.php');
?>

<section class="content">
	<h3>Tambah <?php echo $jenis?></h3><br>

	<form class="col-md-12" method="post" action="tambah.php">
		<div class="form-group">
			<label>NIM Mahasiswa</label>
			<input type="text" name="nama" class="form-control">
			<input type="hidden" name="jenis" value="<?php echo $jenis?>">
		</div>

		<?php if ($jenis != 'kriteria'): ?>
			<?php foreach ($kriteria as $key): ?>
			<div class="form-group">
				<label><?= $key['nama_krit'] ?></label>
				<?php if($key['id_krit']==2){ ?>
					<select class="form-control" name="kriteria[]" id="">
						<option value="A">A</option>
						<option value="A-">A-</option>
						<option value="B+">B+</option>
						<option value="B">B</option>
						<option value="B-">B-</option>
						<option value="C+">C+</option>
						<option value="C">C</option>
						<option value="C-">C-</option>
						<option value="D">D</option>
						<option value="E">E</option>
			
					</select>
				<?php }else if($key['nama_krit']=='Semester'){ ?>
					<select class="form-control" name="kriteria[]" id="">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
					</select>
				<?php }else{ ?>
					<textarea type="text" name="kriteria[]" class="form-control
					<?= ($key['id_krit'] == '1' || $key['id_krit'] == '3') ? 'summernote' : '' ?>"></textarea>
				<?php } ?>
			</div>
			<?php endforeach; ?>
		<?php endif; ?>
		<input class="btn btn-outline-info form-control" type="submit" name="tambah" value="SIMPAN">
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
