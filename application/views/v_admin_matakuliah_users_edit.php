  <div class="content-wrapper ">
    <section class="content-header">
      <h1>
        Ubah Kelas Mahasiswa
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
				  <?php echo form_open("admin/matakuliah_users_aksi_ubah/".$tbl_admin_matakuliah_users->matakuliah_users_id); ?>
					<div class="col-md-6">
					  <div class="form-group">
						<label>Nama Matakuliah</label>
						<select type="text" class="form-control select2" name="matakuliah_id">
							<option value="<?php echo set_value('matakuliah_id', $tbl_admin_matakuliah_users->matakuliah_id); ?>"><?php echo set_value('matakuliah_nama', $tbl_admin_matakuliah_users->matakuliah_nama); ?></option>
							<?php
							foreach($tbl_admin_matakuliah as $data){
								echo "<option value='".$data->matakuliah_id."'>".$data->matakuliah_nama."</option>";
							}
							?>
						</select>
					  </div>
					  <div class="form-group">
						<label>Nama Mahasiswa</label>
						<select type="text" class="form-control select2" name="user_id">
							<option value="<?php echo set_value('user_id', $tbl_admin_matakuliah_users->user_id); ?>"><?php echo set_value('user_nim', $tbl_admin_matakuliah_users->user_nim); ?> - <?php echo set_value('user_fullname', $tbl_admin_matakuliah_users->user_fullname); ?></option>
							
							<?php
							foreach($tbl_admin_matakuliah as $data){
								echo "<option value='".$data->matakuliah_id."'>".$data->matakuliah_nama."</option>";
							}
							?>
						</select>
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