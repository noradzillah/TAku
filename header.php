<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>SPK Mahasiswa Berprestasi</title>

	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="css/sb-admin-2.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

</head>

<body id="page-top">
 

  <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">SPK Mahasiswa Berprestasi</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                <li class="nav-item nav-link"><a class="text-light" href="index.php">Home <span class="sr-only">(current)</span></a>
                <?php if (@$_SESSION['login']){
					 ?>
					<li class="nav-item nav-link"><a class="text-light" href="kriteria.php">Kriteria</a></li>
					<li class="nav-item nav-link"><a class="text-light" href="alternatif.php">Alternatif</a></li>
					<?php if($_SESSION['data']['role']==2 ):   ?>
					<li class="nav-item nav-link"><a class="text-light" href="bobot_kriteria.php">Perbandingan Kriteria</a></li>
					<?php endif; ?>
					<?php if($_SESSION['data']['role']==3 ):   ?>
					<li class="nav-item nav-link dropdown"><a class="text-light" href="#">Perbandingan Alternatif</a>
					<ul class="isi-dropdown">
					<?php

							if (getJumlahKriteria() > 0) {
								for ($i=0; $i <= (getJumlahKriteria()-1); $i++) {
									echo "<a class='collapse-item' href='bobot.php?c=".($i+1)."'><br>".getKriteriaNama($i)."</a>";
								}
							}

							?>dropdown-menu dropdown-menu-right 
					</ul>
					</li>
					<?php endif; ?>
					<li class="nav-item nav-link dropdown"><a class="text-light" href="#">Matriks Perbandingan</a>
					<ul class="isi-dropdown">
							<a class='collapse-item' href='bobot_kriteria.php?submit=true'><br>Kriteria</a>
					<?php

							if (getJumlahKriteria() > 0) {
								for ($i=0; $i <= (getJumlahKriteria()-1); $i++) {
									echo "<a class='collapse-item' href='bobot.php?c=".($i+1)."&submit=true'><br>".getKriteriaNama($i)."</a>";
								}
							}

							?>dropdown-menu dropdown-menu-right 
						
					</ul>
					</li>
					<li class="nav-item nav-link"><a class="text-light" href="hasil.php">Hasil</a></li>
					<?php } ?>
					<li class="nav-item nav-link"><a class="text-light" href="rekomendasi.php">Rekomendasi</a></li>
       				
		      </div>

			  <?php if (isset($_SESSION['login'])): ?>
						<!-- Topbar Navbar -->
					  <ul class="navbar-nav ml-auto">
					    
					    <!-- Nav Item - User Information -->
					    <li class="nav-item dropdown no-arrow">
					      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					        <span class="mr-2 d-none d-lg-inline text-gray-600 "><?= $_SESSION['data']['username'] ?> </span>
					      </a>
					      <!-- Dropdown - User Information -->
					      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
					        <a class="dropdown-item" href="logout.php"  >
					          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
					          Logout
					        </a>
					      </div>
					    </li>
					  </ul>
					<?php endif; ?>
		    </div>
		  </li>

		  <!-- Nav Item - Charts -->

		  <!-- Divider -->
		  <hr class="sidebar-divider d-none d-md-block">

		  <!-- Sidebar Toggler (Sidebar) -->
		  <div class="text-center d-none d-md-inline">
		    <button class="rounded-circle border-0" id="sidebarToggle"></button>
		  </div>

		</ul>
		<!-- End of Sidebar -->

	</div>
           </div>
       </div>
 </nav>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
				
				  <br>					
				</nav>

        <div class="container">

		<style type="text/css">
	html,body{
		padding: 0;
		margin:0;
		font-family: sans-serif;
	}

	.menu{
		background-color: #3141ff;
	}

	.menu ul {
		list-style-type: none;
		margin: 0;
		padding: 0;
		overflow: hidden;
	}

	.menu > ul > li {
		float: center;
	}

	
	.menu li a {
		display: inline-block;
		color: white;
		text-align: center;
		padding: 18px 20px;
		text-decoration: none;
	}

	.menu li a:hover{
		background-color: #2525ff;
	}

	li.dropdown {
		display;
	}

	.dropdown:hover .isi-dropdown {
		display: block;
	}

	.isi-dropdown a:hover {
		color: #fff !important;
	}

	.isi-dropdown {
		position: absolute;
		display: none;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		z-index: 1;
		background-color: #f9f9f9;
	}

	.isi-dropdown a {
		color: #3c3c3c !important;
	}

	.isi-dropdown a:hover {
		color: #232323 !important;
		background: #f3f3f3 !important;
	}
</style>
