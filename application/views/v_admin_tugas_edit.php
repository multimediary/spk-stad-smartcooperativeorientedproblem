  <div class="content-wrapper ">
    <section class="content-header">
      <h1>
        Ubah
      </h1>
    </section>

    <!-- Main content -->
    <section class="content" >
      <div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">
						<span>Silahkan melengkapi form berikut</span>
					</h3>
				</div>
				<div class="box-body">
				  <div class="row">
				  <?php echo form_open_multipart("admin/tugas_aksi_ubah/".$tbl_admin_tugas->tugas_id); ?>
					<div class="col-md-6">
					  <div class="form-group">
						<label>Nama Matakuliah</label>
						<select type="text" class="form-control select2" name="matakuliah_id">
							<option value="<?php echo set_value('matakuliah_id', $tbl_admin_tugas->matakuliah_id); ?>"><?php echo set_value('matakuliah_nama', $tbl_admin_tugas->matakuliah_nama); ?></option>
							<?php
							foreach($tbl_admin_matakuliah as $data){
								echo "<option value='".$data->matakuliah_id."'>".$data->matakuliah_nama."</option>";
							}
							?>
						</select>
					  </div>
					  <div class="form-group">
						<label>Pertemuan</label>
						<input type="text" class="form-control" name="tugas_pertemuan" value="<?php echo set_value('tugas_pertemuan', $tbl_admin_tugas->tugas_pertemuan); ?>">
					  </div>
					  <div class="form-group">
						<label>Nama Tugas</label>
						<input type="text" class="form-control" name="tugas_nama" value="<?php echo set_value('tugas_nama', $tbl_admin_tugas->tugas_nama); ?>">
					  </div>
					  <?php
					  if(strpos($tbl_admin_tugas->tugas_linkvideo, "youtube.com")!== FALSE or strpos($tbl_admin_tugas->tugas_linkvideo, "youtu.be")!== FALSE){
						  $radiosatu = "checked";
						  $radiodua = "";
					  }else{
						  $radiosatu = "";
						  $radiodua = "checked";
					  }
					  ?>
					  <div class="form-group">
						<label>Pilih Sumber Video : </label>
						<label>
						<input type="radio" name='thing' value='valuable' data-id="berkas2" <?php echo $radiosatu;?> /> Youtube
						</label>
						<label>
						<input type="radio" name='thing' value='valuable' data-id="youtube2" <?php echo $radiodua;?> /> Berkas Video
						</label>
					  </div>
					  <div id="berkas2" class="none form-group">
						<label>Video File</label>
						<input type="file" class="form-control" name="userfiles1">
					  </div>
					  <div id="youtube2" class="none form-group">
						<label>Video Link (Youtube Only)</label>
						<input type="text" class="form-control" name="tugas_linkvideo" value="<?php echo set_value('tugas_linkvideo', $tbl_admin_tugas->tugas_linkvideo); ?>">
					  </div>
					  <div class="form-group">
						<label>File</label>
						<input type="file" class="form-control" name="userfiles2">
						<input type="hidden" class="form-control" name="tugas_file" value="<?php echo set_value('tugas_file', $tbl_admin_tugas->tugas_file); ?>">
					  </div>
					  <div class="form-group">
						<input type="submit" name="submit" value="Submit" class="btn btn-success">
					  </div>
					</div>
					<?php echo form_close(); ?>
				  </div>
				</div>
			</div>
		</div>
      </div>
    </section>
	
  </div>