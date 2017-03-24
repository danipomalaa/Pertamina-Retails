$(document).ready(function() {
	$.ajax({
		url:"data.php",
		type:"GET",
		success:function(data){
			console.log(data);
			var tgl_daftar=[];
			var jumlah_pendaftar=[];

			for(var i in data){
				tgl_daftar.push("tgl_daftar " + data[i].tgl_daftar);
				jumlah_pendaftar.push("jumlah_pendaftar " + data[i].jumlah_pendaftar);
			}
			var chartdata = {
				labels:tgl_daftar,
				dataset:[
					{
						label:"Jumlah peserta",
						fill:false,
						lineTension:0.1,
						backgroundColor:"rgba(29,202,255,0.75)",
						borderColor:"rgba(29,202,255,1)",
						pointHoverBackgroundColor:"rgba(29,202,255,1)",
						pointHoverBorderColor:"rgba(29,202,255,1)",
						data:jumlah_pendaftar
					}
				]
			};
			var ctx = $('#mycanvas');

			var LineGraph = new Chart(ctx,{
				type: 'line',
				data:chartdata
			})
		},
		error:function(data){

		}
	});
});