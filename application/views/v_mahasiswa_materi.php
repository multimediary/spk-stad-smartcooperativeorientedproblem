<?php
//Definisikan Jumlah data pertemuan mater dari database tabel materi
foreach($jumlahmateri as $data){
	$jumlah_materi = $data->jumlahmateri;
}
?>
  <div class="content-wrapper ">
    <section class="content-header">
      <h1>
        Materi
      </h1>
    </section>

    <!-- Main content -->
    <section class="content" >
      <div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
					<thead>
					<tr>
					  <th width="40px">No</th>
					  <th>Nama Matakuliah</th>
					  <th width="120px">Action</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$no = 1;
					foreach($tbl_mahasiswa_materi as $data){
						  echo "<tr>
						  <td>".$no."</td>
						  <td>".$data->matakuliah_nama."</td>
						  <td>
						   <a class='btn-sm btn-warning' href='".base_url("mahasiswa/materi/".$data->matakuliah_id)."'><i class='fa fa-eye'></i> Lihat Materi</a>
						  </td>
						  </tr>";
						  $no++;
					}
					?>
					</tbody>
				  </table>
				</div>
			
			<?php
			$getmatakuliah = $this->uri->segment(3);
			$getpertemuan = $this->uri->segment(4);
			if($getmatakuliah!=""){
			?>	<hr/>
				<div class="box-body">
					<div class="col-md-12">
						<div class="box-body no-padding">
							<table class="table table-bordered table-striped table-condensed">
								<tr>
									<td width="30%"> Matakuliah yang dipilih </td>
									<td width="5%" style="text-align:center;"> : </td>
									<td>
										<?php 
										foreach($tbl_mahasiswa_matakuliah as $data){
											echo $data->matakuliah_nama;
										}?>
									</td>
								</tr>
								<tr>
									<td width="30%"> Pilih Pertemuan </td>
									<td width="5%" style="text-align:center;"> : </td>
									<td>
										<select type="text" class="form-control select2" onchange="if (this.value) window.location='<?php echo base_url();?>mahasiswa/materi/<?php echo $getmatakuliah;?>/'+this.value">
											<option><?php 
											if($getpertemuan!=""){ echo $getpertemuan; }else{ echo "-- Pilih --";}?>
											</option>
											<?php
											for($x=1;$x<=$jumlah_materi;$x++){
												echo "<option value='".$x."'>".$x."</option>";
											}
											?>
										</select>
									</td>
								</tr>
								<?php 
								foreach($tbl_admin_materi as $data){
								?>	
								<tr>
									<td width="30%" >
										Nama Materi 
									</td>
									<td width="5%" style="text-align:center;"> : </td>
									<td>
										<?php echo $data->materi_nama;?>
									</td>
								</tr>
								<tr>
									<td width="30%" >
										Download Materi 
									</td>
									<td width="5%" style="text-align:center;"> : </td>
									<td><?php 
									if(strpos($data->materi_linkvideo, "youtube.com")!== FALSE or strpos($data->materi_linkvideo, "youtu.be")!== FALSE){
									}else{?>
										Video : <a href="<?php echo base_url();?>upload/materi/<?php echo $data->materi_linkvideo;?>">
										<img width="50" src="<?php echo base_url();?>assets/dist/img/video.png"> </a>
									<?php } ?>
										PDF : <a href="<?php echo base_url();?>upload/materi/<?php echo $data->materi_file;?>">
										<img width="50" src="<?php echo base_url();?>assets/dist/img/pdf.png"> </a>
									</td>
								</tr>
								<tr>
									<td width="35%" >
										<?php
										if($data->materi_linkvideo!=''){
											if(strpos($data->materi_linkvideo, "youtube.com")!== FALSE or strpos($data->materi_linkvideo, "youtu.be")!== FALSE){
										?>
												<div class="embed-responsive embed-responsive-16by9">
													<iframe class="embed-responsive-item" src="<?php echo $data->materi_linkvideo;?>" frameborder="0" allowfullscreen></iframe>
												</div>
												
										<?php }else{ ?>
												<video width="550" height="" controls>
												  <source src="<?php echo base_url();?>upload/materi/<?php echo $data->materi_linkvideo;?>" type="video/mp4">
												  <source src="<?php echo base_url();?>upload/materi/<?php echo $data->materi_linkvideo;?>" type="video/ogg">
												  Your browser does not support HTML5 video.
												</video>
										<?php
											}
										}
										?>
									</td>
									<td colspan="2">
										<embed style="border:2px solid black;" src="<?php echo base_url();?>upload/materi/<?php echo $data->materi_file;?>" type="application/pdf" 
										width="100%" height="320" scrollbar="1" navpanes="1" />
									</td>
								</tr>
								<?php }?>
							</table>
						</div>
					</div>
				</div>
			</div>			
			<?php } ?>
		</div>
      </div>
    </section>
	
  </div>