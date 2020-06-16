<?php
$getgrafik = $this->uri->segment(3);
$geturlmatakuliah = $this->uri->segment(4);
$geturlpertemuan = $this->uri->segment(5);
//Definisikan Jumlah data dari jumlah Mahasiswa pada matakuliah tersebut dari database
foreach($tbl_users_2 as $data){
	$jumlah_mahasiswa_matakuliah = $data->jumlahmahasiswamatakuliah;
}
////////////////////////////////////////////////
//Definisikan Jumlah pertemuan dari select Max pada  tabel nilai
foreach($tbl_users_3 as $data){
	$jumlah_pertemuan = $data->jumlahpertemuanmatakuliah;
}
////////////////////////////////////////////////

if($getgrafik =="1"){
	$label_grafik = "Grafik Nilai Per Mata Kuliah dan Per Pertemuan";
	$color_grafik = "rgba(60,141,188,0.7)";
	$jumlah_grafik = $jumlah_mahasiswa_matakuliah;
	$data_axis_x = 'user_nim';
	$grafix_axis_x       = $this->db->query("select $data_axis_x from tbl_admin_nilai, tbl_admin_matakuliah_users, tbl_users
	where tbl_admin_nilai.matakuliah_users_id=tbl_admin_matakuliah_users.matakuliah_users_id
	and tbl_admin_matakuliah_users.user_id=tbl_users.user_id
	and tbl_admin_matakuliah_users.matakuliah_id = '$geturlmatakuliah'
	and tbl_admin_nilai.nilai_pertemuan = '$geturlpertemuan'");

	$data_axis_y = 'nilai_angka';
	$grafix_axis_y       = $this->db->query("select $data_axis_y from tbl_admin_nilai, tbl_admin_matakuliah_users, tbl_users
	where tbl_admin_nilai.matakuliah_users_id=tbl_admin_matakuliah_users.matakuliah_users_id
	and tbl_admin_matakuliah_users.user_id=tbl_users.user_id
	and tbl_admin_matakuliah_users.matakuliah_id = '$geturlmatakuliah'
	and tbl_admin_nilai.nilai_pertemuan = '$geturlpertemuan'"); 
}else{
	$label_grafik = "Grafik Nilai Per Pertemuan Per Mahasiswa";
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
}
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
							<td width="10%">
							<div class="form-group">
								<select type="text" class="form-control select2" onchange="if (this.value) window.location='<?php echo base_url();?>admin/grafik/'+this.value+'/<?php echo $geturlmatakuliah;?>/<?php echo $geturlpertemuan;?>'">
									<?php
									if($getgrafik!="0"){
										echo "<option value='".$getgrafik."'>".$getgrafik."</option>";
									}else{
										echo "<option>-- Pilih Grafik --</option>";
									}
									
									echo "<option value='1'>Grafik Nilai Per Mata Kuliah dan Per Pertemuan</option>";
									echo "<option value='2'>Grafik Nilai Per Pertemuan Per Mahasiswa</option>";
									
									?>
								</select>
							</div>
							</td>
							<td width="30%">
							<div class="form-group">
								<select type="text" class="form-control select2" onchange="if (this.value) window.location='<?php echo base_url();?>admin/grafik/<?php echo $getgrafik;?>/'+this.value+'/<?php echo $geturlpertemuan;?>'">
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
							<td width="50%">
							<?php 
							if($getgrafik =="1"){?>
							<div class="form-group">
								<select type="text" class="form-control select2" onchange="if (this.value) window.location='<?php echo base_url();?>admin/grafik/<?php echo $getgrafik;?>/<?php echo $geturlmatakuliah;?>/'+this.value">
									<?php
									if($geturlpertemuan!="0"){
										echo "<option value='".$geturlpertemuan."'>Pertemuan Ke ".$geturlpertemuan."</option>";
									}else{
										echo "<option>-- Pilih Pertemuan --</option>";
									}
									
									for($pert = 1; $pert <=$jumlah_pertemuan; $pert++){
										echo "<option value='".$pert."'>Pertemuan Ke ".$pert."</option>";
									}
									?>
								</select>
							</div>
							<?php }else{?>
							<div class="form-group">
								<select type="text" class="form-control select2" onchange="if (this.value) window.location='<?php echo base_url();?>admin/grafik/<?php echo $getgrafik;?>/<?php echo $geturlmatakuliah;?>/'+this.value">
									<?php
									if($geturlpertemuan!="0"){
										echo "<option value='".$tbl_users_1->user_id."'>".$tbl_users_1->user_fullname."</option>";
										
									}else{
										echo "<option>-- Pilih Mahasiswa --</option>";
									}
									
									foreach($tbl_users as $data2){
										echo "<option value='".$data2->user_id."'>".$data2->user_fullname."</option>";
									}
									?>
								</select>
							</div>
							<?php }?>
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