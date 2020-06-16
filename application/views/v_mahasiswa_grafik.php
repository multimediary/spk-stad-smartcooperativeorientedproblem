<?php
$geturlmatakuliah = $this->uri->segment(3);
$geturlpertemuan = $tbl_users_1->user_id;
foreach($tbl_users_3 as $data){
	$jumlah_pertemuan = $data->jumlahpertemuanmatakuliah;
}
////////////////////////////////////////////////


	$label_grafik = "Grafik Nilai Per Pertemuan";
	$color_grafik = "rgba(155, 29, 132, 0.2)";
	$jumlah_grafik = $jumlah_pertemuan;
	$data_axis_x = 'nilai_pertemuan';
	$grafix_axis_x       = $this->db->query("select CONCAT('Pertemuan ',$data_axis_x)as $data_axis_x from tbl_admin_nilai, tbl_admin_matakuliah_users, tbl_users
	where tbl_admin_nilai.matakuliah_users_id=tbl_admin_matakuliah_users.matakuliah_users_id
	and tbl_admin_matakuliah_users.user_id=tbl_users.user_id
	and tbl_admin_matakuliah_users.matakuliah_id = '$geturlmatakuliah'
	and tbl_users.user_id = '$geturlpertemuan'");

	$data_axis_y = 'nilai_angka';
	$grafix_axis_y       = $this->db->query("select $data_axis_y from tbl_admin_nilai, tbl_admin_matakuliah_users, tbl_users
	where tbl_admin_nilai.matakuliah_users_id=tbl_admin_matakuliah_users.matakuliah_users_id
	and tbl_admin_matakuliah_users.user_id=tbl_users.user_id
	and tbl_admin_matakuliah_users.matakuliah_id = '$geturlmatakuliah'
	and tbl_users.user_id = '$geturlpertemuan'");
////////////////////////////////////////////////


?>
<script src="<?php echo base_url(); ?>assets/plugins/chartjs/Chart.bundle.js"></script>
<div class="content-wrapper ">
    <!-- Main content -->
    <section class="content" >
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<table width="100%">
							<tr>
							<td width="30%">
							<div class="form-group">
								<select type="text" class="form-control select2" onchange="if (this.value) window.location='<?php echo base_url();?>mahasiswa/grafik/'+this.value+'/<?php echo $geturlpertemuan;?>'">
									<?php
									if($geturlmatakuliah!="0"){
										echo "<option value='".$tbl_admin_matakuliah_2->matakuliah_id."'>".$tbl_admin_matakuliah_2->matakuliah_nama."</option>";
									}else{
										echo "<option>-- Pilih Matakuliah --</option>";
									}
									
									foreach($tbl_admin_matakuliah as $data0){
										echo "<option value='".$data0->matakuliah_id."'>".$data0->matakuliah_nama."</option>";
									}
									?>
								</select>
							</div>
							</td>
							</tr>
						</table>
							<div class="container">
								<canvas id="myChart" style="height:230px"></canvas>
							</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php foreach ($grafix_axis_x->result_array() as $row_axis_x) { echo '"' . $row_axis_x[$data_axis_x] . '",';}?>],
                    datasets: [{
                            label: '<?php echo $label_grafik;?>',
                            data: [<?php foreach ($grafix_axis_y->result_array() as $row_axis_y) { echo '"' . $row_axis_y[$data_axis_y] . '",';}?>],
                            backgroundColor: [
                                /* ''*/
								<?php for($x=0; $x<$jumlah_grafik; $x++){?>
									'<?php echo $color_grafik;?>',
								<?php }?>
                            ],
                            borderColor: [
                                /* 'rgba(255,99,132,1)',*/
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
			
        </script>