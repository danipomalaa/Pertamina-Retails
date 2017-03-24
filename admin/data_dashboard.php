<script src="../js/jquery-2.1.1.js"></script>
<?php
	include '../koneksi.php';
	$pilih = $_POST['pilih'];
	include '../koneksi.php';
	if($_GET['data']=="admin"){
		if ($pilih == "lokasi") {
	        
		      $query  = mysqli_query($conn,"SELECT b.nama_lokasi ,count(*)peserta FROM `tbl_peserta` AS a inner join tbl_lokasi AS b on a.kode_lokasi = b.kode_lokasi group by b.nama_lokasi");
		      $myurl[] = "['nama_lokasi','peserta']";
		      while ($r = mysqli_fetch_assoc($query)) {
		        $title = "Peserta";
		        $nama_lokasi = $r['nama_lokasi'];
		        $peserta = $r['peserta'];
		        $myurl[] = "['".$nama_lokasi."',".$peserta."]";

		      }
		      ?>
		      	
		      	<script type='text/javascript'>
		      		google.charts.load('current', {'packages':['corechart']});
			        google.charts.setOnLoadCallback(drawChart);

			        function drawChart() {
			            var data = google.visualization.arrayToDataTable([
			              <?php echo (implode(",",$myurl)); ?>
			            ]);

			            var options = {
			              title: '<?php echo ($title); ?>',
			              curveType: 'function',
			              legend: { position: 'bottom' }
			            };

			        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

			        chart.draw(data, options);
			        }
			    </script>

			    <?php


		}
		if ($pilih == "agent") {
			
			$query  = mysqli_query($conn,"SELECT concat(b.nama_depan,' ',b.nama_belakang)nama_agent ,count(*)peserta FROM `tbl_peserta` AS a inner join tbl_agent AS b on a.kode_agent = b.kode_agent group by b.kode_agent");
		      $myurl[] = "['nama_agent','peserta']";
		      while ($r = mysqli_fetch_assoc($query)) {
		        $title = "Peserta";
		        $nama_agent = $r['nama_agent'];
		        $peserta = $r['peserta'];
		        $myurl[] = "['".$nama_agent."',".$peserta."]";

		      }
		      ?>
		      	<script type='text/javascript'>
		      		google.charts.load('current', {'packages':['corechart']});
			        google.charts.setOnLoadCallback(drawChart);

			        function drawChart() {
			            var data = google.visualization.arrayToDataTable([
			              <?php echo (implode(",",$myurl)); ?>
			            ]);

			            var options = {
			              title: '<?php echo ($title); ?>',
			              curveType: 'function',
			              legend: { position: 'bottom' }
			            };

			        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

			        chart.draw(data, options);
			        }
			    </script>
			    
			    <?php

		}
		else{

			$query  = mysqli_query($conn,"SELECT DATE_FORMAT(tgl_daftar, '%d-%m-%Y') AS tgl_daftar,count(*)peserta FROM `tbl_peserta` group by tgl_daftar");
		    $myurl[] = "['tgl_daftar','peserta']";
		    while ($r = mysqli_fetch_assoc($query)) {
		        $title = "Peserta";
		        $tgl_daftar = $r['tgl_daftar'];
		        $peserta = $r['peserta'];
		        $myurl[] = "['".$tgl_daftar."',".$peserta."]";

		    }

			?>

			<script type="text/javascript">
		        google.charts.load('current', {'packages':['corechart']});
		        google.charts.setOnLoadCallback(drawChart);

		        function drawChart() {
		            var data = google.visualization.arrayToDataTable([
		              <?php echo (implode(",",$myurl)); ?>
		            ]);

		            var options = {
		              title: '<?php echo ($title); ?>',
		              curveType: 'function',
		              legend: { position: 'bottom' }
		            };

		        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

		        chart.draw(data, options);
		        }
		    </script>

		    <?php
		}

	}

	if ($_GET['data']=="agent") {
		?>
			<script type="text/javascript">
				google.charts.load('current', {packages: ['corechart']});
			</script>
		<?php
		if ($pilih == "lokasi") {
			$kode_lokasi = $_POST['kode'];
			$query  = mysqli_query($conn,"SELECT DATE_FORMAT(tgl_daftar, '%d-%m-%Y') AS tgl_daftar,count(*)peserta FROM `tbl_peserta` where kode_lokasi = '$kode_lokasi' group by tgl_daftar");
			$myurl[] = "['tgl_daftar','peserta']";
			while ($r = mysqli_fetch_assoc($query)) {
				$lokasi = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tbl_lokasi where kode_lokasi = '$kode_lokasi' "));
			    $title = "Peserta";
			    $tgl_daftar = $r['tgl_daftar'];
			    $peserta = $r['peserta'];
			    $myurl[] = "['".$tgl_daftar."',".$peserta."]";

			}

			?>

			<script type="text/javascript">
		        
		        google.charts.setOnLoadCallback(drawBasic);

		        function drawBasic() {
		            var data = new google.visualization.arrayToDataTable([
		              <?php echo (implode(",",$myurl)); ?>
		            ]);
		            var options = {
		                hAxis: {
		                  title: '<?php echo $lokasi['nama_lokasi'] ?>'
		                },
		                vAxis: {
		                  title: '<?php echo ($title); ?>'
		                },
		                curveType: 'function'
		            };

		            var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

		            chart.draw(data, options);
		        }
		    </script>

			<?php
		}
		else{
			$kode_agent = $_POST['kode_agent'];
			$query  = mysqli_query($conn,"SELECT DATE_FORMAT(tgl_daftar, '%d-%m-%Y') AS tgl_daftar,count(*)peserta FROM `tbl_peserta` where kode_agent = '$kode_agent' group by tgl_daftar ");
			$myurl[] = "['tgl_daftar','peserta']";
			while ($r = mysqli_fetch_assoc($query)) {
			    $title = "Peserta";
			    $tgl_daftar = $r['tgl_daftar'];
			    $peserta = $r['peserta'];
			    $myurl[] = "['".$tgl_daftar."',".$peserta."]";

			}

			?>

			<script type="text/javascript">
		        
				google.charts.setOnLoadCallback(drawBasic);
		        function drawBasic() {
		            var data = new google.visualization.arrayToDataTable([
		              <?php echo (implode(",",$myurl)); ?>
		            ]);
		            var options = {
		                hAxis: {
		                  title: 'Tanggal'
		                },
		                vAxis: {
		                  title: '<?php echo ($title); ?>'
		                },
		                curveType: 'function'
		            };

		            var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

		            chart.draw(data, options);
		        }
		    </script>

			<?php
		}
	}

	if($_GET['data']=="sitemanager"){
		if ($pilih == "lokasi") {
	        
		      $query  = mysqli_query($conn,"SELECT b.nama_lokasi, count(*)peserta FROM `tbl_peserta` AS a inner join tbl_lokasi AS b on a.kode_lokasi = b.kode_lokasi group by b.nama_lokasi");
		      $myurl[] = "['nama_lokasi','peserta']";
		      while ($r = mysqli_fetch_assoc($query)) {
		        $title = "Peserta";
		        $nama_lokasi = $r['nama_lokasi'];
		        $peserta = $r['peserta'];
		        $myurl[] = "['".$nama_lokasi."',".$peserta."]";

		      }
		      ?>
		      	
		      	<script type='text/javascript'>
		      		google.charts.load('current', {'packages':['corechart']});
			        google.charts.setOnLoadCallback(drawChart);

			        function drawChart() {
			            var data = google.visualization.arrayToDataTable([
			              <?php echo (implode(",",$myurl)); ?>
			            ]);

			            var options = {
			              title: '<?php echo ($title); ?>',
			              curveType: 'function',
			              legend: { position: 'bottom' }
			            };

			        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

			        chart.draw(data, options);
			        }
			    </script>

			    <?php


		}
		if ($pilih == "agent") {
			
			$query  = mysqli_query($conn,"SELECT concat(b.nama_depan,' ',b.nama_belakang)nama_agent ,count(*)peserta FROM `tbl_peserta` AS a inner join tbl_agent AS b on a.kode_agent = b.kode_agent group by b.kode_agent");
		      $myurl[] = "['nama_agent','peserta']";
		      while ($r = mysqli_fetch_assoc($query)) {
		        $title = "Peserta";
		        $nama_agent = $r['nama_agent'];
		        $peserta = $r['peserta'];
		        $myurl[] = "['".$nama_agent."',".$peserta."]";

		      }
		      ?>
		      	<script type='text/javascript'>
		      		google.charts.load('current', {'packages':['corechart']});
			        google.charts.setOnLoadCallback(drawChart);

			        function drawChart() {
			            var data = google.visualization.arrayToDataTable([
			              <?php echo (implode(",",$myurl)); ?>
			            ]);

			            var options = {
			              title: '<?php echo ($title); ?>',
			              curveType: 'function',
			              legend: { position: 'bottom' }
			            };

			        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

			        chart.draw(data, options);
			        }
			    </script>
			    
			    <?php

		}
		else{

			$kode = $_POST['kode'];
			$query  = mysqli_query($conn,"SELECT DATE_FORMAT(tgl_daftar, '%d-%m-%Y') AS tgl_daftar,count(*)peserta FROM `tbl_peserta` where kode_lokasi = '$kode' group by tgl_daftar ");
		    $myurl[] = "['tgl_daftar','peserta']";
		    while ($r = mysqli_fetch_assoc($query)) {
		        $title = "Peserta";
		        $tgl_daftar = $r['tgl_daftar'];
		        $peserta = $r['peserta'];
		        $myurl[] = "['".$tgl_daftar."',".$peserta."]";
		    }

			?>

			<script type="text/javascript">
				google.charts.load('current', {'packages':['corechart']});
		      	google.charts.setOnLoadCallback(drawChart);

		      function drawChart() {
		        var data = google.visualization.arrayToDataTable([
		          <?php echo (implode(",",$myurl)); ?>
		        ]);

		        var options = {
		          title: '<?php echo ($title); ?>',
		          curveType: 'function',
		          legend: { position: 'bottom' }
		        };

		        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

		        chart.draw(data, options);
		      }
		    </script>
		        
		    <?php
		}

	}

?>