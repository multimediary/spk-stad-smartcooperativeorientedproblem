  <div class="content-wrapper ">
    <section class="content-header">
      <h1>
        Input Tugas
      </h1>
    </section>

    <!-- Main content -->
    <section class="content" >
      <div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">
						<a class="btn-sm btn-primary" href="<?php echo base_url("admin/tugas_tambah");?>"><i class="fa fa-plus"></i> <span>Tambah</span></a>
					</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
				  <table id="example2" class="table table-bordered table-striped">
					<thead>
					<tr>
					  <th width="40px">No</th>
					  <th>Nama Matakuliah</th>
					  <th>Pertemuan</th>
					  <th>Nama Tugas</th>
					  <th>Video</th>
					  <th>File</th>
					  <th width="120px">Action</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$no = 1;
					foreach($tbl_admin_tugas as $data){
						  echo "<tr>
						  <td>".$no."</td>
						  <td>".$data->matakuliah_nama."</td>
						  <td>".$data->tugas_pertemuan."</td>
						  <td>".$data->tugas_nama."</td>
						  <td>";
					if($data->tugas_linkvideo!=''){
						if(strpos($data->tugas_linkvideo, "youtube.com")!== FALSE or strpos($data->tugas_linkvideo, "youtu.be")!== FALSE){
					?>
							<div class="embed-responsive embed-responsive-16by9">
								<iframe class="embed-responsive-item" src="<?php echo $data->tugas_linkvideo;?>" frameborder="0" allowfullscreen></iframe>
							</div>
							
					<?php }else{ ?>
							<video width="60" height="60" controls>
							  <source src="<?php echo base_url();?>upload/tugas/<?php echo $data->tugas_linkvideo;?>" type="video/mp4">
							  <source src="<?php echo base_url();?>upload/tugas/<?php echo $data->tugas_linkvideo;?>" type="video/ogg">
							  Your browser does not support HTML5 video.
							</video>
					<?php
						}
					}
						  echo "</td>
					<td>";
					if($data->tugas_file!=''){
					?>
						<a href="<?php echo base_url();?>upload/tugas/<?php echo $data->tugas_file;?>" target="_blank"><img src="<?php echo base_url(); ?>assets/dist/img/pdf.png" width="60" height="60"></a>
					<?php
					}else{
							echo "";
					}
						  echo "</td>
						  <td>
						  <a class='btn-sm btn-warning' href='".base_url("admin/tugas_ubah/".$data->tugas_id)."'>Ubah</a>
						  <a onclick=\"return confirm('Yakin untuk dihapus?')\" class='btn-sm btn-danger' href='".base_url("admin/tugas_aksi_hapus/".$data->tugas_id)."'>Hapus</a></td>
						  </tr>";
						  $no++;
					}
					?>
					</tbody>
				  </table>
				</div>
				<!-- /.box-body -->
			  </div>
		</div>
      </div>
    </section>
 </div>