<?php
	include_once '../layout/header.php';
	include '../../kumpulan_function.php';
    $soal = new Soal();

	$resultDaftarRoom = $soal->DaftarRoom();
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
			case 11:
			    echo '
					<script>
						alert("Room Baru Berhasil Dihapus");
					</script>
				';
			break;
		    case 12:
			    echo '
					<script>
						alert("Query Hapus Peserta Bermasalah");
					</script>
				';
			break;
		    case 13:
			    echo '
					<script>
						alert("Query Hapus Peserta Bermasalah");
					</script>
				';
			break;
    		case 14:
    			echo '
    				<script>
    					alert("Query Hapus Room Bermasalah");
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
	            Room
	          </h1>
	        </div>

          	<div class="col-sm-6">
	          <a href="tambah_room" class="btn btn-primary float-sm-right ml-2" style="width: 15%;"><abbr title="Tambah Room"><i class="fas fa-plus"></i></abbr></a>
	        </div>
		</div>

    </div>
  </section>
  <section class="content">
    <div class="container-fluid">
    	<div class="row">
			<?php if($resultDaftarRoom->num_rows > 0): ?>
				<?php while ($rowDaftarRoom = $resultDaftarRoom->fetch_assoc()): ?>
				<div class="col-md-4">
					<div class="card card-primary card-outline">
						<div class="card-header">
							<h2 class="card-title m-0 text-secondary">
								<?=$rowDaftarRoom['nama_room'];?>
							</h2>
						</div>
						<div class="card-body text-center">
							<div class="row">
								<div class="col">
									<h3>
										<?=$rowDaftarRoom['nama_room'];?> - <?=$rowDaftarRoom['tanggal']?>
									</h3>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<h3>
										Deskripsi
									</h3>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<a href="detail_room?room_id=<?=$rowDaftarRoom['id']?>" class="btn btn-secondary float-sm-right">Detail</a>
							<a href="../query/room_query?room_id=<?= $rowDaftarRoom['id'] ?>&status=Hapus" class="btn btn-danger float-sm-right mr-2">Hapus</a>
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
			    					Belum Ada Room Yang Ditambahkan
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