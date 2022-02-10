<?php
	include_once '../layout/header.php';
	include '../../kumpulan_function.php';
    $soal = new Soal();

	$resultDaftarSkor = $soal->DaftarRoom();
	if(isset($_GET['status']))
	{
		switch ($_GET['status']) {
			case 0:
				echo '
					<script>
						alert("Gagal Menambahkan Room Baru\nQuery Add Room Bermasalah");
					</script>
				';
				break;
			case 1:
				echo '
					<script>
						alert("Room Baru Berhasil Ditambahkan");
					</script>
				';
				break;
			
			default:
				# code...
				break;
		}
	}

	

?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="content-fluid ">

		<div class="row mb-2">
	        <div class="col-sm-6">
	          <h1 class="m-0 pl-2 text-dark">
	            Daftar Skor Room
	          </h1>
	        </div>
		</div>

    </div>
  </section>
  <section class="content">
    <div class="container-fluid">
    	<div class="row">
			<?php if($resultDaftarSkor->num_rows > 0): ?>
				<?php while ($rowDaftarSkor = $resultDaftarSkor->fetch_assoc()): ?>
				<div class="col-md-4">
					<div class="card card-primary card-outline">
						<div class="card-header">
							<h2 class="card-title m-0 text-secondary">
								SKOR ROOM <?=$rowDaftarSkor['nama_room'];?> <?=$rowDaftarSkor['tanggal'];?> 
							</h2>
						</div>
						<div class="card-body text-center">
							<div class="row">
								<div class="col">
									<h3>
										<?=$rowDaftarSkor['nama_room'];?> - <?=$rowDaftarSkor['tanggal']?>
									</h3>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<a href="detail_skor?room_id=<?=$rowDaftarSkor['id']?>" class="btn btn-secondary float-sm-right">Detail</a>
						</div>
					</div>
				</div>
				<?php endwhile;?>
			<?php else: ?>
			<div class="col-md-4">
				<div class="card card-primary card-outline">
					<div class="card-header">
						<h2 class="card-title m-0 text-secondary">
							Room
						</h2>
					</div>
					<div class="card-body text-center">
						<div class="row">
							<div class="col">
								<h3>
			    					Belum Ada Test Yang Dilakukan
			    				</h3>
							</div>
						</div>
					</div>
					<div class="card-footer">
					</div>
				</div>
			</div>
			<?php endif; ?>
		</div>

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<!-- jQuery -->
<script src="../../layout/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../layout/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../layout/plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="../../layout/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../layout/dist/js/demo.js"></script>
<!-- page script -->