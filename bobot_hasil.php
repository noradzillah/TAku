<?php
	include('header.php');

?>

<section class="container" style="margin-bottom: 20px">

	<?php if ($consRatio > 0.1){ ?>
	<div class="alert alert-danger" role="alert">
		<small>Nilai Consistency Ratio melebihi 10%. Mohon inputkan kembali <a href="bobot_kriteria.php">Perbandingan Kriteria</a></small>
	</div>
	<div class="alert alert-danger" role="alert">
		<small>Mohon input kembali tabel perbandingan...</small>
	</div><br>
	<?php } ?>

	<h4>Matriks Perbandingan Berpasangan</h4><br>
	<table class="table table-stripped">
		<thead class="thead-dark">
			<tr>
				<th>Kriteria</th>
<?php
	for ($i=0; $i <= ($n-1); $i++) {
		echo "<th>".getAlternatifNama($i)."</th>";
	}
?>
			</tr>
		</thead>
		<tbody>
<?php
	for ($x=0; $x <= ($n-1); $x++) {
		echo "<tr>";
		echo "<td>".getAlternatifNama($x)."</td>";
			for ($y=0; $y <= ($n-1); $y++) {
				echo "<td>".round($matrik[$x][$y],5)."</td>";
			}

		echo "</tr>";
	}
?>
		</tbody>
		<tfoot>
			<tr>
				<th>Jumlah</th>
<?php
		for ($i=0; $i <= ($n-1); $i++) {
			echo "<th>".round($jmlmpb[$i],5)."</th>";
		}
?>
			</tr>
		</tfoot>
	</table>


	<br>

	<h4>Matriks Nilai Alternatif Dalam Kriteria</h4><br>
	<table class="table table-stripped">
		<thead class="thead-dark">
			<tr>
				<th>Kriteria</th>
<?php
	for ($i=0; $i <= ($n-1); $i++) {
		echo "<th>".getAlternatifNama($i)."</th>";
	}
?>
				<th>Jumlah</th>
				<th>Priority Vector</th>
			</tr>
		</thead>
		<tbody>
<?php
	for ($x=0; $x <= ($n-1); $x++) {
		echo "<tr>";
		echo "<td>".getAlternatifNama($x)."</td>";
			for ($y=0; $y <= ($n-1); $y++) {
				echo "<td>".round($matrikb[$x][$y],5)."</td>";
			}

		echo "<td>".round($jmlmnk[$x],5)."</td>";
		echo "<td>".round($pv[$x],5)."</td>";

		echo "</tr>";
	}
?>

		</tbody>
		<tfoot>
			<tr>
				<th colspan="<?php echo ($n+2)?>">λ maks</th>
				<th><?php echo (round($eigenvektor,4))?></th>
			</tr>
			<tr>
				<th colspan="<?php echo ($n+2)?>">Consistency Index</th>
				<th><?php echo (round($consIndex,4))?></th>
			</tr>
			<tr>
				<th colspan="<?php echo ($n+2)?>">Consistency Ratio</th>
				<th><?php echo (round(($consRatio * 100),2))?> %</th>
			</tr>
		</tfoot>
	</table>



<?php

	if ($consRatio > 0.1) {
?>

<a href='javascript:history.back()'>
	<button class="btn btn-danger">
		 <i class="fa fa-angle-left"></i> Kembali
	</button>
</a>

<?php

	} else {
		if ($jenis == getJumlahKriteria()) {
?>

<br>
<?php if($_SESSION['data']['role']==3):   ?>
<a class="btn btn-outline-info" style="float: right; margin-bottom: 5%" href="hasil.php">
	Lanjut  <i class="fa fa-angle-right"></i>
</a>
<?php endif; ?>


<?php

		} else {

?>
	<?php if($_SESSION['data']['role']==3):   ?>
	<a class="btn btn-outline-info" style="float: right; margin-bottom: 5%" href="<?php echo "bobot.php?c=".($jenis + 1)?>">
		Lanjut  <i class="fa fa-angle-right"></i>
	</a>
	<?php endif; ?>

<?php

		}
	}

	echo "</section>";
	include('footer.php');

?>
