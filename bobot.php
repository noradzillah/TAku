<?php
	include('config.php');
	include('fungsi.php');

	$jenis = $_GET['c'];

	include('header.php');
?>
<div class="container">
	<section class="content row">
		<h3>Perbandingan Alternatif terhadap <?php echo getKriteriaNama($jenis-1) ?></h3><br>
		<?php showTabelPerbandingan($jenis,'alternatif'); ?>
	</section>
</div>

<script>
	function validasiNumber() {
		
	}
</script>

<?php if (isset($_GET['submit'])): ?>
	<script type="text/javascript">
		document.getElementById("btnSubmit").click();
	</script>
<?php endif; ?>

<?php include('footer.php'); ?>
