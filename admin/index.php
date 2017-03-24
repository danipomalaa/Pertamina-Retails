<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div id="container">
		<select name="nama" id="nama">
			<option>1</option>
			<option>2</option>
		</select>
	</div>
	<br><br><br><br>
	<div id="result"></div>
	<!-- Mainly scripts -->
    <script src="../js/jquery-2.1.1.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="../js/inspinia.js"></script>
    <script src="../js/plugins/pace/pace.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function () {
			$('#nama').focus();
			$('#nama').keypress(function(event){
				var key = (event.keyCode ? event.keyCode : event.which);
				if (key == 13) {
					var info = $('#nama').val();
					$.ajax({
						method: "POST",
						url: "action.php",
						data: {nama: info},
						success: function(status){
							$('#result').append(status);
							$('#nama').val('select');

						}
					});
				}

			});
		});
	</script>

</body>
</html>