<?php
error_reporting(0);
//Definisikan URL
$geturlmatakuliah = $this->uri->segment(3);
$geturlpertemuan = $this->uri->segment(4);
//$geturljumlahgroup = $this->uri->segment(5);
$geturljumlahgroup = 8;

////////////////////////////////////////////////
//Definisikan Jumlah data dari jumlah Mahasiswa pada matakuliah tersebut dari database
foreach($tbl_users_2 as $data){
	$jumlah_mahasiswa_matakuliah = $data->jumlahmahasiswamatakuliah;
}
////////////////////////////////////////////////

//Definisikan Jumlah clustering
$jumlah_clustering = 4;
////////////////////////////////////////////////

//Definisikan Jumlah pertemuan dari select Max pada  tabel nilai
foreach($tbl_users_3 as $data){
	$jumlah_pertemuan = $data->jumlahpertemuanmatakuliah;
}
////////////////////////////////////////////////

//Definisikan Jumlah Kelompok, nanti bisa dibuatkan pada select
$jumlah_kelompok = $geturljumlahgroup;
$tampil_baris = $jumlah_mahasiswa_matakuliah/$jumlah_kelompok;
////////////////////////////////////////////////

//definisikan C1, C2, C3, C4 dan Literasi maksudnya adalah ID dari User yang kita pilih secara random
$defc[1] = "2";
$defc[2] = "8";
$defc[3] = "20";
$defc[4] = "21";

//definisikan Jumlah Literasi berdasarkan Jumlah Clustering
for($a = 1; $a <=$jumlah_clustering; $a++){
	$literasi[$a] = $a;
}
////////////////////////////////////////////////

//Definisi untuk pangkat ^2
$pangkatdua = 2;
////////////////////////////////////////////////

//Definisi untuk pertemuan STAD , nanti diambil dari getURL segment 4 saja
$pertemuan = $geturlpertemuan;
////////////////////////////////////////////////

//NILAI DEFAULT APABILA TIDAK ADA DI DATABASE
for($a = 1; $a <=$jumlah_mahasiswa_matakuliah; $a++)
{
	$nilai[$a]="0";
	$nilai_stad[$a][$a]="0";
}

for($countp = 1; $countp<=$jumlah_clustering; $countp++){
	$count_clusterxyz[$literasi[$countp ]][$pertemuan][$countp]['x'] = "0";
}
							
for($ifcountp = 1; $ifcountp<=$jumlah_clustering; $ifcountp++){
	$countifx[$literasi[1]][$pertemuan][$ifcountp] = 1;
	$countify[$literasi[1]][$pertemuan][$ifcountp] = 1;
	$countifz[$literasi[1]][$pertemuan][$ifcountp] = 1;
}	
					
for($ifcountp = 1; $ifcountp<=$jumlah_clustering; $ifcountp++){
	$sum_clusterxyz[$literasi[1]][$pertemuan][$ifcountp]['x'] = "0";
	$sum_clusterxyz[$literasi[1]][$pertemuan][$ifcountp]['y'] = "0";
	$sum_clusterxyz[$literasi[1]][$pertemuan][$ifcountp]['z'] = "0";
}

							
for($ifcountp = 1; $ifcountp<=$jumlah_clustering; $ifcountp++){
	$countifx[$literasi[2]][$pertemuan][$ifcountp] = 1;
	$countify[$literasi[2]][$pertemuan][$ifcountp] = 1;
	$countifz[$literasi[2]][$pertemuan][$ifcountp] = 1;
}	
					
for($ifcountp = 1; $ifcountp<=$jumlah_clustering; $ifcountp++){
	$sum_clusterxyz[$literasi[2]][$pertemuan][$ifcountp]['x'] = "0";
	$sum_clusterxyz[$literasi[2]][$pertemuan][$ifcountp]['y'] = "0";
	$sum_clusterxyz[$literasi[2]][$pertemuan][$ifcountp]['z'] = "0";
}

////////////////////////////////////////////////
?>
  <div class="content-wrapper ">
    <section class="content-header">
      <h1>
        Group
      </h1>
    </section>

    <!-- Main content -->
    <section class="content" >
      <div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
						<table width="100%">
							<tr>
							<td width="20%">
							<div class="form-group">
								<select type="text" class="form-control select2" onchange="if (this.value) window.location='<?php echo base_url();?>mahasiswa/group/'+this.value+'/0'">
									<?php
									$geturlmatakuliah = $this->uri->segment(3);
									if($geturlmatakuliah!="0"){
										echo "<option value='".$tbl_admin_matakuliah_2->matakuliah_id."'>".$tbl_admin_matakuliah_2->matakuliah_nama."</option>";
									}else{
										echo "<option>-- Pilih Matakuliah --</option>";
									}
									
									foreach($tbl_admin_matakuliah as $data1){
										echo "<option value='".$data1->matakuliah_id."'>".$data1->matakuliah_nama."</option>";
									}
									?>
								</select>
							</div>
							</td>
							<td width="20%">
							<div class="form-group">
								<select type="text" class="form-control select2" onchange="if (this.value) window.location='<?php echo base_url();?>mahasiswa/group/<?php echo $geturlmatakuliah;?>/'+this.value">
									<?php
									if($geturlpertemuan!="0"){
										echo "<option value='".$geturlpertemuan."'>Pertemuan Ke "; echo $geturlpertemuan; echo "</option>";
									}else{
										echo "<option>-- Pilih Pertemuan --</option>";
									}
									
									for($pert = 1; $pert <=$jumlah_pertemuan; $pert++){
										echo "<option value='".$pert."'>Pertemuan Ke "; echo $pert; echo "</option>";
									}
									?>
								</select>
							</div>
							</td>
							<td width="40%">
								<div class="form-group" style="text-align:right;">
									<a class="no-print btn btn-success" href="javascript:printDiv('print-area-2');"><i class="fa fa-print"></i> &nbsp;&nbsp;Cetak Nama Kelompok</a>
								</div>
							</td>
							</tr>
						</table>
				</div>
			</div>
		</div>
		<div class="col-xs-4" style="display: none">
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body">
					<h5 class="box-title">
						<center><label>Data Nilai IPK dan Algo</label></center>
					</h5>
					  <table id="example3" class="table table-bordered table-striped">
						<thead>
						<tr>
						  <th rowspan="2" style="text-align:center;">No</th>
						  <th rowspan="2" style="text-align:center;">Nama Lengkap</th>
						  <th colspan="2" style="text-align:center;">Nilai</th>
						</tr>
						<tr>
						  <th style="text-align:center;">IPK</th>
						  <th style="text-align:center;">Algo</th>
						</tr>
						</thead>
						<tbody>
						<?php
						//NILAI DEFAULT APABILA TIDAK ADA DI DATABASE
						for($a = 1; $a <=40; $a++)
						{
							$nilai[$a]="0";
							$nilai_stad[$a][$a]="0";
						}
						////////////////////////////////////////////////
						
						
						if($geturlmatakuliah!="0"){
							
							$no = 1;
							foreach($tbl_users as $data){
								$nilai_ipk[$data->user_id] = $data->m_nilai_ipk;
								$nilai_algo[$data->user_id] = $data->m_nilai_algo;
								  echo "<tr>
								  <td>".$no."</td>
								  <td>".$data->user_fullname."</td>
								  <td>".$nilai_ipk[$data->user_id]."</td>
								  <td>".$nilai_algo[$data->user_id]."</td>
								  </tr>";
								$no++;
							}
						}
						?>
						</tbody>
					  </table>
					</div>
					<!-- /.box-body -->
				</div>
		</div>
		
		<div class="col-xs-8" style="display: none">
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body">
					<h5 class="box-title">
						<center><label>Nilai Pertemuan </label></center>
					</h5>
					  <table id="example4" class="table table-bordered table-striped">
						<thead>
					<tr>
					  <th rowspan="2"  style="text-align:center;">No</th>
					  <th rowspan="2"  style="text-align:center;">Nama Lengkap</th>
					  <th colspan="12" style="text-align:center;">Pertemuan (Nilai STAD)</th>
					</tr>
					<tr>
					  <th>1</th>
					  <th>2</th>
					  <th>3</th>
					  <th>4</th>
					  <th>5</th>
					  <th>6</th>
					  <th>7</th>
					  <th>8</th>
					  <th>9</th>
					  <th>10</th>
					  <th>11</th>
					  <th>12</th>
					</tr>
					</thead>
						<tbody>
						<?php
						
						
						$no = 1;
						foreach($tbl_users as $data){
							  echo "<tr>
							  <td>".$no."</td>
							  <td>".$data->user_fullname."</td>";
							  for($i = 1; $i <=$jumlah_pertemuan; $i++)
							  {
								  echo"
									<td>";
									$query = $this->db->query("select nilai_angka as p$i, nilai_pertemuan as np$i
									from tbl_users,tbl_admin_nilai, tbl_admin_matakuliah, tbl_admin_matakuliah_users
									where tbl_admin_matakuliah_users.matakuliah_users_id=tbl_admin_nilai.matakuliah_users_id and
									tbl_admin_matakuliah_users.user_id=tbl_users.user_id and tbl_admin_matakuliah_users.matakuliah_id=tbl_admin_matakuliah.matakuliah_id
									and tbl_admin_nilai.nilai_id IN
									(select nilai_id as p1
									from tbl_users,tbl_admin_nilai, tbl_admin_matakuliah, tbl_admin_matakuliah_users
									where tbl_users.user_id=tbl_admin_matakuliah_users.user_id and tbl_admin_matakuliah.matakuliah_id=tbl_admin_matakuliah_users.matakuliah_id and
									tbl_admin_matakuliah_users.matakuliah_users_id=tbl_admin_nilai.matakuliah_users_id and
									tbl_admin_matakuliah_users.matakuliah_id=tbl_admin_matakuliah.matakuliah_id and nilai_pertemuan = $i)
									and tbl_admin_matakuliah.matakuliah_id = '$geturlmatakuliah'
									and tbl_users.user_id='$data->user_id'");
									foreach ($query->result_array() as $row)
									{
										$nilai[$i] = $row['p'.$i];
										if($row['np'.$i]!=1){
											if(($nilai[$i]-$nilai[$i-1])<-10){
												$nilai_stad[$data->user_id][$i] = "5";
											}elseif(($nilai[$i]-$nilai[$i-1])>10){
												$nilai_stad[$data->user_id][$i] = "30";
											}elseif(($nilai[$i]+$nilai[$i-1])==200){
												$nilai_stad[$data->user_id][$i] = "30";
											}elseif(($nilai[$i]-$nilai[$i-1])>=0){
												$nilai_stad[$data->user_id][$i] = "20";
											}elseif(($nilai[$i]-$nilai[$i-1])<0){
												$nilai_stad[$data->user_id][$i] = "10";
											}
										}else{
											$nilai_stad[$data->user_id][$i] = "0";
										}
											
										echo  $nilai_stad[$data->user_id][$i];
									}
									echo "</td>";
							  }
							  echo "</tr>";
							$no++;
						}
						?>
						</tbody>
					  </table>
					</div>
					<!-- /.box-body -->
				</div>
		</div>
		
		<div class="col-xs-12" style="display: none">
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body">
					<h5 class="box-title">
						<center><label>Literasi Ke-1</label></center>
					</h5>
					  <table id="literasi<?php echo $literasi[1];?>" class="table table-bordered table-striped">
						<thead>
						<tr>
						  <th rowspan="2" style="text-align:center;">Data ke-i</th>
						  <?php for($ulangi = 1; $ulangi<=$jumlah_clustering; $ulangi++){	?>
						  <th rowspan="2" style="text-align:center;">C<?php echo $ulangi; ?></th>
						  <?php	} ?>
						  <th rowspan="2" style="text-align:center;">Clustering</th>
						  <?php for($ulangi = 1; $ulangi<=$jumlah_clustering; $ulangi++){	?>
						  <th colspan="3" style="text-align:center;">Cluster <?php echo $ulangi; ?> </th>
						  <?php	} ?>
						</tr>
						<?php
							for($ulangi = 1; $ulangi<=$jumlah_clustering; $ulangi++){	?>
							  <th style="text-align:center;">x</th>	
							  <th style="text-align:center;">y</th>	
							  <th style="text-align:center;">z</th>	
						<?php	} ?>						
						</tr>
						</thead>
						<tbody>
<?php						
if($geturlmatakuliah!="0"){
							$no = 1;
							foreach($tbl_users as $data){
								  echo "<tr>
								  <td>".$no."</td>";
								  
							for($ulangirumus = 1; $ulangirumus<=$jumlah_clustering; $ulangirumus++){	  
								  echo "<td>";
								  $nilai_cluster[$pertemuan][$ulangirumus][$data->user_id] = 
								  ROUND(SQRT(pow($nilai_ipk[$data->user_id]-$nilai_ipk[$defc[$ulangirumus]],$pangkatdua)+
								  pow($nilai_algo[$data->user_id]-$nilai_algo[$defc[$ulangirumus]],$pangkatdua)+
								  pow($nilai_stad[$data->user_id][$pertemuan]-$nilai_stad[$defc[$ulangirumus]][$pertemuan],$pangkatdua)),2);
								  echo $c[$pertemuan][$ulangirumus] = $nilai_cluster[$pertemuan][$ulangirumus][$data->user_id];
								  echo "</td>";
							}
							
								  if($c[$pertemuan][1]<$c[$pertemuan][2] AND $c[$pertemuan][1]<$c[$pertemuan][3] AND $c[$pertemuan][1]<$c[$pertemuan][4]){
									  $clustering[$pertemuan][$literasi[1]] = 1;
								  }elseif($c[$pertemuan][2]<$c[$pertemuan][1] AND $c[$pertemuan][2]<$c[$pertemuan][3] AND $c[$pertemuan][2]<$c[$pertemuan][4]){
									  $clustering[$pertemuan][$literasi[1]] = 2;
								  }elseif($c[$pertemuan][3]<$c[$pertemuan][1] AND $c[$pertemuan][3]<$c[$pertemuan][2] AND $c[$pertemuan][3]<$c[$pertemuan][4]){
									  $clustering[$pertemuan][$literasi[1]] = 3;
								  }else{
									  $clustering[$pertemuan][$literasi[1]] = 4;
								  }
								  
								   echo "<td>".$clustering[$pertemuan][$literasi[1]]."</td>";
								
							for($ulangicluster = 1; $ulangicluster<=$jumlah_clustering; $ulangicluster++){
								  if($clustering[$pertemuan][$literasi[1]]==$ulangicluster){
									  $clusterxyz[$literasi[1]][$pertemuan][$ulangicluster]['x'][$no] = $nilai_ipk[$data->user_id];
									  $clusterxyz[$literasi[1]][$pertemuan][$ulangicluster]['y'][$no] = $nilai_algo[$data->user_id];
									  $clusterxyz[$literasi[1]][$pertemuan][$ulangicluster]['z'][$no] = $nilai_stad[$data->user_id][$pertemuan];
								  }else{
									  $clusterxyz[$literasi[1]][$pertemuan][$ulangicluster]['x'][$no] = 0;
									  $clusterxyz[$literasi[1]][$pertemuan][$ulangicluster]['y'][$no] = 0;
									  $clusterxyz[$literasi[1]][$pertemuan][$ulangicluster]['z'][$no] = 0;
								  }
							}
							
							for($ulangiclusterxyz = 1; $ulangiclusterxyz<=$jumlah_clustering; $ulangiclusterxyz++){							
								  echo "<td>".$clusterxyz[$literasi[1]][$pertemuan][$ulangiclusterxyz]['x'][$no]."</td>";
								  echo "<td>".$clusterxyz[$literasi[1]][$pertemuan][$ulangiclusterxyz]['y'][$no]."</td>";
								  echo "<td>".$clusterxyz[$literasi[1]][$pertemuan][$ulangiclusterxyz]['z'][$no]."</td>";
							}	  
								  echo " </tr>";
								$no++;
							}
}							
?>
						</tbody>
					  </table>
					</div>
					<!-- /.box-body -->
					<div class="box-body">
<style>
table.ctr, th.ctr, td.ctr {
  text-align: center;
}
</style>
<?php
if($geturlmatakuliah!="0"){
							
			echo "<table class='table table-bordered table-striped ctr'>";
			echo "<th></th><th class='ctr' colspan='3'>Cluster 1</th><th class='ctr' colspan='3'>Cluster 2</th>
			<th class='ctr' colspan='3'>Cluster 3</th><th class='ctr' colspan='3'>Cluster 4</th></tr>";
			echo "<tr><th></th>";
			echo "<th class='ctr' > x </th><th class='ctr' > y </th><th class='ctr' > z </th>";
			echo "<th class='ctr' > x </th><th class='ctr' > y </th><th class='ctr' > z </th>";
			echo "<th class='ctr' > x </th><th class='ctr' > y </th><th class='ctr' > z </th>";
			echo "<th class='ctr' > x </th><th class='ctr' > y </th><th class='ctr' > z </th>";
			echo "</tr>";
							
			for($counttot = 1; $counttot<=$jumlah_clustering; $counttot++){	
				for($x = 1; $x<=$jumlah_mahasiswa_matakuliah; $x++){
					$jumlah_clusterxyz[$literasi[1]][$pertemuan][$counttot]['x'] = $clusterxyz[$literasi[1]][$pertemuan][$counttot]['x'][$x];
					$sum_clusterxyz[$literasi[1]][$pertemuan][$counttot]['x'] +=$clusterxyz[$literasi[1]][$pertemuan][$counttot]['x'][$x];
									
					$jumlah_clusterxyz[$literasi[1]][$pertemuan][$counttot]['y'] = $clusterxyz[$literasi[1]][$pertemuan][$counttot]['y'][$x];
					$sum_clusterxyz[$literasi[1]][$pertemuan][$counttot]['y'] +=$jumlah_clusterxyz[$literasi[1]][$pertemuan][$counttot]['y'];
									
					$jumlah_clusterxyz[$literasi[1]][$pertemuan][$counttot]['z'] = $clusterxyz[$literasi[1]][$pertemuan][$counttot]['z'][$x];
					$sum_clusterxyz[$literasi[1]][$pertemuan][$counttot]['z'] +=$jumlah_clusterxyz[$literasi[1]][$pertemuan][$counttot]['z'];
				}
			}		
			
			echo "<tr><th class='ctr' > TOTAL </th>";
			for($tot = 1; $tot <=$jumlah_clustering; $tot++){
				echo"<td>";
				echo $sum_clusterxyz[$literasi[1]][$pertemuan][$tot]['x'];
				echo"</td><td>";
				echo $sum_clusterxyz[$literasi[1]][$pertemuan][$tot]['y'];
				echo"</td><td>";
				echo $sum_clusterxyz[$literasi[1]][$pertemuan][$tot]['z'];
				echo"</td>";
			}
			echo "</tr>";
							
			for($countjml = 1; $countjml<=$jumlah_clustering; $countjml++){
				for($x = 1; $x<=$jumlah_mahasiswa_matakuliah; $x++){
					if($clusterxyz[$literasi[1]][$pertemuan][$countjml]['x'][$x]!="0"){
						$count_clusterxyz[$literasi[1]][$pertemuan][$countjml]['x'] = $countifx[$literasi[1]][$pertemuan][$countjml]++;
					}
					if($clusterxyz[$literasi[1]][$pertemuan][$countjml]['y'][$x]!="0"){
						$count_clusterxyz[$literasi[1]][$pertemuan][$countjml]['y'] = $countify[$literasi[1]][$pertemuan][$countjml]++;
					}
					if($clusterxyz[$literasi[1]][$pertemuan][$countjml]['z'][$x]!="0"){
						$count_clusterxyz[$literasi[1]][$pertemuan][$countjml]['z'] = $countifz[$literasi[1]][$pertemuan][$countjml]++;
					}
				}
			}
							
			echo "<tr><th class='ctr' > JUMLAH DATA </th>";
			for($jml = 1; $jml <=$jumlah_clustering; $jml++){
				echo"<td>";echo $count_clusterxyz[$literasi[1]][$pertemuan][$jml]['x'];echo"</td><td>";echo $count_clusterxyz[$literasi[1]][$pertemuan][$jml]['y'];echo"</td><td>";echo $count_clusterxyz[$literasi[1]][$pertemuan][$jml]['z'];echo"</td>";
			}
			echo "</tr>";
						
			for($countavg = 1; $countavg <=$jumlah_clustering; $countavg++){
				$divide[$pertemuan][$countavg]['x'] = ROUND($sum_clusterxyz[$literasi[1]][$pertemuan][$countavg]['x']/$count_clusterxyz[$literasi[1]][$pertemuan][$countavg]['x'],1);
				$divide[$pertemuan][$countavg]['y'] = ROUND($sum_clusterxyz[$literasi[1]][$pertemuan][$countavg]['y']/$count_clusterxyz[$literasi[1]][$pertemuan][$countavg]['y'],1);
				$divide[$pertemuan][$countavg]['z'] = ROUND($sum_clusterxyz[$literasi[1]][$pertemuan][$countavg]['z']/$count_clusterxyz[$literasi[1]][$pertemuan][$countavg]['z'],1);
			}						
						
			echo "<tr><th class='ctr' > AVERAGE </th>";
			for($avg = 1; $avg <=$jumlah_clustering; $avg++){
				echo"<td>";echo $divide[$pertemuan][$avg]['x'];echo"</td><td>";echo $divide[$pertemuan][$avg]['y'];echo"</td><td>";echo $divide[$pertemuan][$avg]['z'];echo"</td>";
			}
			echo "</tr>";
			echo "</table>";
}
?>
					</div>
				</div>
		</div>

<?php 
for($lit = 2; $lit <=$jumlah_clustering; $lit++){
?>
		<div class="col-xs-12" style="display: none">
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body">
					<h5 class="box-title">
						<center><label>Literasi Ke-<?php echo $literasi[$lit];?></label></center>
					</h5>
					  <table id="literasi<?php echo $literasi[$lit];?>" class="table table-bordered table-striped">
						<thead>
						<tr>
						  <th rowspan="2" style="text-align:center;">Data ke-i</th>
						  <?php for($ulangi = 1; $ulangi<=$jumlah_clustering; $ulangi++){	?>
						  <th rowspan="2" style="text-align:center;">C<?php echo $ulangi; ?></th>
						  <?php	} ?>
						  <th rowspan="2" style="text-align:center;">Clustering</th>
						  <?php for($ulangi = 1; $ulangi<=$jumlah_clustering; $ulangi++){	?>
						  <th colspan="3" style="text-align:center;">Cluster <?php echo $ulangi; ?> </th>
						  <?php	} ?>
						</tr>
						<?php
							for($ulangi = 1; $ulangi<=$jumlah_clustering; $ulangi++){	?>
							  <th style="text-align:center;">x</th>	
							  <th style="text-align:center;">y</th>	
							  <th style="text-align:center;">z</th>	
						<?php	} ?>						
						</tr>
						</thead>
						<tbody>
<?php						
if($geturlmatakuliah!="0"){
							$no = 1;
							foreach($tbl_users as $data){
								  echo "<tr>
								  <td>".$no."</td>";
								  
							for($ulangirumus = 1; $ulangirumus<=$jumlah_clustering; $ulangirumus++){	  
								  echo "<td>";
								  $nilai_cluster[$pertemuan][$ulangirumus][$data->user_id] = 
								  ROUND(SQRT(pow($nilai_ipk[$data->user_id]-$divide[$pertemuan][$ulangirumus]['x'],$pangkatdua)+
								  pow($nilai_algo[$data->user_id]-$divide[$pertemuan][$ulangirumus]['y'],$pangkatdua)+
								  pow($nilai_stad[$data->user_id][$pertemuan]-$divide[$pertemuan][$ulangirumus]['z'],$pangkatdua)),2);
								  echo $c[$pertemuan][$ulangirumus] = $nilai_cluster[$pertemuan][$ulangirumus][$data->user_id];
								  echo "</td>";
							}
							
								  if($c[$pertemuan][1]<$c[$pertemuan][2] AND $c[$pertemuan][1]<$c[$pertemuan][3] AND $c[$pertemuan][1]<$c[$pertemuan][4]){
									  $clustering[$pertemuan][$literasi[$lit]] = 1;
								  }elseif($c[$pertemuan][2]<$c[$pertemuan][1] AND $c[$pertemuan][2]<$c[$pertemuan][3] AND $c[$pertemuan][2]<$c[$pertemuan][4]){
									  $clustering[$pertemuan][$literasi[$lit]] = 2;
								  }elseif($c[$pertemuan][3]<$c[$pertemuan][1] AND $c[$pertemuan][3]<$c[$pertemuan][2] AND $c[$pertemuan][3]<$c[$pertemuan][4]){
									  $clustering[$pertemuan][$literasi[$lit]] = 3;
								  }else{
									  $clustering[$pertemuan][$literasi[$lit]] = 4;
								  }
								  
								   echo "<td>";
								   $clustering_akhir[$pertemuan][$data->user_id] = $clustering[$pertemuan][$literasi[$lit]];
								   echo $clustering_akhir[$pertemuan][$data->user_id];
								   echo "</td>";
								
							for($ulangicluster = 1; $ulangicluster<=$jumlah_clustering; $ulangicluster++){
								  if($clustering[$pertemuan][$literasi[$lit]]==$ulangicluster){
									  $clusterxyz[$literasi[$lit]][$pertemuan][$ulangicluster]['x'][$no] = $nilai_ipk[$data->user_id];
									  $clusterxyz[$literasi[$lit]][$pertemuan][$ulangicluster]['y'][$no] = $nilai_algo[$data->user_id];
									  $clusterxyz[$literasi[$lit]][$pertemuan][$ulangicluster]['z'][$no] = $nilai_stad[$data->user_id][$pertemuan];
								  }else{
									  $clusterxyz[$literasi[$lit]][$pertemuan][$ulangicluster]['x'][$no] = 0;
									  $clusterxyz[$literasi[$lit]][$pertemuan][$ulangicluster]['y'][$no] = 0;
									  $clusterxyz[$literasi[$lit]][$pertemuan][$ulangicluster]['z'][$no] = 0;
								  }
							}
							
							for($ulangiclusterxyz = 1; $ulangiclusterxyz<=$jumlah_clustering; $ulangiclusterxyz++){							
								  echo "<td>".$clusterxyz[$literasi[$lit]][$pertemuan][$ulangiclusterxyz]['x'][$no]."</td>";
								  echo "<td>".$clusterxyz[$literasi[$lit]][$pertemuan][$ulangiclusterxyz]['y'][$no]."</td>";
								  echo "<td>".$clusterxyz[$literasi[$lit]][$pertemuan][$ulangiclusterxyz]['z'][$no]."</td>";
							}	  
								  echo " </tr>";
								$no++;
							}
}							
?>
						</tbody>
					  </table>
					</div>
					<!-- /.box-body -->
					<div class="box-body">
<style>
table.ctr, th.ctr, td.ctr {
  text-align: center;
}


</style>
<?php
if($geturlmatakuliah!="0"){
							
			echo "<table class='table table-bordered table-striped ctr'>";
			echo "<th></th><th class='ctr' colspan='3'>Cluster 1</th><th class='ctr' colspan='3'>Cluster 2</th>
			<th class='ctr' colspan='3'>Cluster 3</th><th class='ctr' colspan='3'>Cluster 4</th></tr>";
			echo "<tr><th></th>";
			echo "<th class='ctr' > x </th><th class='ctr' > y </th><th class='ctr' > z </th>";
			echo "<th class='ctr' > x </th><th class='ctr' > y </th><th class='ctr' > z </th>";
			echo "<th class='ctr' > x </th><th class='ctr' > y </th><th class='ctr' > z </th>";
			echo "<th class='ctr' > x </th><th class='ctr' > y </th><th class='ctr' > z </th>";
			echo "</tr>";
							
			for($counttot = 1; $counttot<=$jumlah_clustering; $counttot++){	
				for($x = 1; $x<=$jumlah_mahasiswa_matakuliah; $x++){
					$jumlah_clusterxyz[$literasi[$lit]][$pertemuan][$counttot]['x'] = $clusterxyz[$literasi[$lit]][$pertemuan][$counttot]['x'][$x];
					$sum_clusterxyz[$literasi[$lit]][$pertemuan][$counttot]['x'] +=$jumlah_clusterxyz[$literasi[$lit]][$pertemuan][$counttot]['x'];
									
					$jumlah_clusterxyz[$literasi[$lit]][$pertemuan][$counttot]['y'] = $clusterxyz[$literasi[$lit]][$pertemuan][$counttot]['y'][$x];
					$sum_clusterxyz[$literasi[$lit]][$pertemuan][$counttot]['y'] +=$jumlah_clusterxyz[$literasi[$lit]][$pertemuan][$counttot]['y'];
									
					$jumlah_clusterxyz[$literasi[$lit]][$pertemuan][$counttot]['z'] = $clusterxyz[$literasi[$lit]][$pertemuan][$counttot]['z'][$x];
					$sum_clusterxyz[$literasi[$lit]][$pertemuan][$counttot]['z'] +=$jumlah_clusterxyz[$literasi[$lit]][$pertemuan][$counttot]['z'];
				}
			}		
			
			echo "<tr><th class='ctr' > TOTAL </th>";
			for($tot = 1; $tot <=$jumlah_clustering; $tot++){
				echo"<td>";
				echo $sum_clusterxyz[$literasi[$lit]][$pertemuan][$tot]['x'];
				echo"</td><td>";
				echo $sum_clusterxyz[$literasi[$lit]][$pertemuan][$tot]['y'];
				echo"</td><td>";
				echo $sum_clusterxyz[$literasi[$lit]][$pertemuan][$tot]['z'];
				echo"</td>";
			}
			echo "</tr>";
							
			for($countjml = 1; $countjml<=$jumlah_clustering; $countjml++){
				for($x = 1; $x<=$jumlah_mahasiswa_matakuliah; $x++){
					if($clusterxyz[$literasi[$lit]][$pertemuan][$countjml]['x'][$x]!="0"){
						$count_clusterxyz[$literasi[$lit]][$pertemuan][$countjml]['x'] = $countifx[$literasi[$lit]][$pertemuan][$countjml]++;
					}
					if($clusterxyz[$literasi[$lit]][$pertemuan][$countjml]['y'][$x]!="0"){
						$count_clusterxyz[$literasi[$lit]][$pertemuan][$countjml]['y'] = $countify[$literasi[$lit]][$pertemuan][$countjml]++;
					}
					if($clusterxyz[$literasi[$lit]][$pertemuan][$countjml]['z'][$x]!="0"){
						$count_clusterxyz[$literasi[$lit]][$pertemuan][$countjml]['z'] = $countifz[$literasi[$lit]][$pertemuan][$countjml]++;
					}
				}
			}
							
			echo "<tr><th class='ctr' > JUMLAH DATA </th>";
			for($jml = 1; $jml <=$jumlah_clustering; $jml++){
				echo "<td>"; echo $count_clusterxyz[$literasi[$lit]][$pertemuan][$jml]['x'];echo"</td>";
				echo "<td>"; echo $count_clusterxyz[$literasi[$lit]][$pertemuan][$jml]['y'];echo"</td>";
				echo "<td>"; echo $count_clusterxyz[$literasi[$lit]][$pertemuan][$jml]['z'];echo"</td>";
			}
			echo "</tr>";
						
			for($countavg = 1; $countavg <=$jumlah_clustering; $countavg++){
				$divide[$pertemuan][$countavg]['x'] = ROUND($sum_clusterxyz[$literasi[$lit]][$pertemuan][$countavg]['x']/$count_clusterxyz[$literasi[$lit]][$pertemuan][$countavg]['x'],1);
				$divide[$pertemuan][$countavg]['y'] = ROUND($sum_clusterxyz[$literasi[$lit]][$pertemuan][$countavg]['y']/$count_clusterxyz[$literasi[$lit]][$pertemuan][$countavg]['y'],1);
				$divide[$pertemuan][$countavg]['z'] = ROUND($sum_clusterxyz[$literasi[$lit]][$pertemuan][$countavg]['z']/$count_clusterxyz[$literasi[$lit]][$pertemuan][$countavg]['z'],1);
			}						
						
			echo "<tr><th class='ctr' > AVERAGE </th>";
			for($avg = 1; $avg <=$jumlah_clustering; $avg++){
				echo"<td>";echo $divide[$pertemuan][$avg]['x'];echo"</td><td>";echo $divide[$pertemuan][$avg]['y'];echo"</td><td>";echo $divide[$pertemuan][$avg]['z'];echo"</td>";
			}
			echo "</tr>";
			echo "</table>";
}
?>
					</div>
				</div>
		</div>
<?php } ?>

		<div class="col-xs-12" style="display: none">
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body">
					<h5 class="box-title">
						<center><label>Hasil Clustering Akhir</label></center>
					</h5>
					  <table id="example6" class="table table-bordered table-striped">
						<thead>
						<tr>
						  <th style="text-align:center;">No</th>
						  <th style="text-align:center;">NIM</th>
						  <th style="text-align:center;">Nama Lengkap</th>
						  <th style="text-align:center;">Clustering</th>
						</tr>
						</thead>
						<tbody>
<?php						
if($geturlmatakuliah!="0"){
							$no = 1;
							foreach($tbl_users as $data){
								  echo "<tr>
								  <td>".$no."</td>
								  <td>";
								  $dataakhir_user_nim[$no] = $data->user_nim;
								  $dataakhir_user_image[$no] = $data->user_image;
								  echo $dataakhir_user_nim[$no];
								  echo "</td>
								  <td>";
								  $dataakhir_user_fullname[$no] = $data->user_fullname;
								  echo $dataakhir_user_fullname[$no];
								  echo "</td>
								  <td>";
								  $dataakhir_cluster[$no] = $clustering_akhir[$pertemuan][$data->user_id];
								  
								  echo $dataakhir_cluster[$no];
								  echo "</td></tr>";
								$no++;
							}
}							
?>
						</tbody>
					  </table>
					</div>
				</div>
		</div>
		
		<div class="col-xs-12" style="display:none;">
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body">
					<h5 class="box-title">
						<center><label>Hasil Pengurutan</label></center>
					</h5>
					  <table id="example7" class="table table-bordered table-striped">
						<thead>
						<tr>
						  <th style="text-align:center;">No</th>
						  <th style="text-align:center;">NIM</th>
						  <th style="text-align:center;">Nama Lengkap</th>
						  <th style="text-align:center;">Clustering</th>
						</tr>
						</thead>
						<tbody>
<?php						
if($geturlmatakuliah!="0"){
								$nomor = 1;
								for($pengurutan=$jumlah_clustering; $pengurutan>=1; $pengurutan--){
									for ($y=1; $y<=$jumlah_mahasiswa_matakuliah; $y++){
										if($dataakhir_cluster[$y] == $pengurutan){
												echo "<tr><td>";
												echo $nomor;
												echo "</td><td>"; 
												$data_sorting_id[$nomor]=$y; 
												$data_sorting_user_image[$nomor]=$dataakhir_user_image[$y]; 
												$data_sorting_user_nim[$nomor]=$dataakhir_user_nim[$y]; 
												echo $data_sorting_user_nim[$nomor];
												echo "</td><td>"; 
												$data_sorting_user_fullname[$nomor]=$dataakhir_user_fullname[$y]; 
												echo $data_sorting_user_fullname[$nomor];
												echo "</td><td>";
												echo $dataakhir_cluster[$y];
												echo "</td></tr>";
										$nomor++;
										}
									}
								}
								
}							
?>
						</tbody>
					  </table>
					</div>
				</div>
		</div>

<div id="print-area-2" class="print-area">	
		
		<div class="col-xs-12">
				<div class="box">
					
					<!-- /.box-header -->
					<div class="box-body">
					<table class="table table-bordered table-striped" border="1">
						<tr>
							<td>matakuliah </td><td>: </td><td><?php echo $tbl_admin_matakuliah_2->matakuliah_nama;?></td>
						</tr>
						<tr>
							<td>Nama-nama berikut adalah untuk Pertemuan Ke </td><td>: </td><td><?php echo $geturlpertemuan;?></td>
						</tr>
					</table>
					
					</div>
				</div>
		</div>
		<div class="col-xs-12">
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body">
					<h5 class="box-title">
						<center><label>Nama Kelompok</label></center>
					</h5>
					  <table id="example8" class="table table-bordered table-striped" border="1" width="100%">
						<thead>
						<tr>
							<th style="text-align:center;" colspan="<?php echo $jumlah_kelompok;?>">Kelompok</th>
						</tr>
						<tr>
						<?php 
						for($kelompok = 1; $kelompok <= $jumlah_kelompok ; $kelompok++){
							echo "<th style='text-align:center;'>$kelompok</th>";	
						}?>
						</tr>
						</thead>
						<tbody>
<?php						
if($geturlmatakuliah!="0"  and $geturlpertemuan>"0"){
						for($transformer=0; $transformer<$tampil_baris; $transformer++){
							echo "<tr>";
								for($urutan = $jumlah_kelompok*$transformer+1; $urutan <= $jumlah_kelompok*($transformer+1) ; $urutan++){
									echo "<td>"; 
									echo "<img src='".base_url()."assets/avatar/".$data_sorting_user_image[$urutan]."?".strtotime("now")."' width='80px' height='80px'>";
									echo "<br>";
									echo $data_sorting_user_fullname[$urutan];
									echo "<br>";
									echo "NIM: ".$data_sorting_user_nim[$urutan];
									echo "</td>";
								}
							echo "</tr>";
						}
}							
?>
						</tbody>
					  </table>
					</div>
				</div>
		</div>


</div>
<textarea id="printing-css" style="display:none;">html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:'';content:none}table{border-collapse:collapse;border-spacing:0}body{font:normal normal .8125em/1.4 Arial,Sans-Serif;background-color:white;color:#333}strong,b{font-weight:bold}cite,em,i{font-style:italic}a{text-decoration:none}a:hover{text-decoration:underline}a img{border:none}abbr,acronym{border-bottom:1px dotted;cursor:help}sup,sub{vertical-align:baseline;position:relative;top:-.4em;font-size:86%}sub{top:.4em}small{font-size:86%}kbd{font-size:80%;border:1px solid #999;padding:2px 5px;border-bottom-width:2px;border-radius:3px}mark{background-color:#ffce00;color:black}p,blockquote,pre,table,figure,hr,form,ol,ul,dl{margin:1.5em 0}hr{height:1px;border:none;background-color:#666}h1,h2,h3,h4,h5,h6{font-weight:bold;line-height:normal;margin:1.5em 0 0}h1{font-size:200%}h2{font-size:180%}h3{font-size:160%}h4{font-size:140%}h5{font-size:120%}h6{font-size:100%}ol,ul,dl{margin-left:3em}ol{list-style:decimal outside}ul{list-style:disc outside}li{margin:.5em 0}dt{font-weight:bold}dd{margin:0 0 .5em 2em}input,button,select,textarea{font:inherit;font-size:100%;line-height:normal;vertical-align:baseline}textarea{display:block;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}pre,code{font-family:"Courier New",Courier,Monospace;color:inherit}pre{white-space:pre;word-wrap:normal;overflow:auto}blockquote{margin-left:2em;margin-right:2em;border-left:4px solid #ccc;padding-left:1em;font-style:italic}table[border="1"] th,table[border="1"] td,table[border="1"] caption{border:1px solid;padding:.5em 1em;text-align:left;vertical-align:top}th{font-weight:bold}table[border="1"] caption{border:none;font-style:italic}.no-print{display:none};</textarea>
<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
	  </div>
    </section>
  </div>