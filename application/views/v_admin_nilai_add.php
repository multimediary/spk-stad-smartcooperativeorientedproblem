  <div class="content-wrapper ">
    <section class="content-header">
      <h1>
        Tambah
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
				  <?php echo form_open("admin/nilai_aksi_tambah"); ?>
					<div class="col-md-6">
					  <div class="form-group">
						<label>Pilih Matakuliah</label>
						<select type="text" class="form-control select2" onchange="if (this.value) window.location='<?php echo base_url();?>admin/nilai_tambah/'+this.value">
							<?php
								echo "<option value='".$tbl_admin_matakuliah_2->matakuliah_id."'>".$tbl_admin_matakuliah_2->matakuliah_nama."</option>";
							
							foreach($tbl_admin_matakuliah as $data1){
								echo "<option value='".$data1->matakuliah_id."'>".$data1->matakuliah_nama."</option>";
							}
							?>
						</select>
					  </div>
					  <div class="form-group">
						<label>Pilih Mahasiswa</label>
						<select type="text" class="form-control select2" name="matakuliah_users_id">
							<option>-- Pilih --</option>
							<?php
							foreach($tbl_admin_matakuliah_users as $data2){
								echo "<option value='".$data2->matakuliah_users_id."'>".$data2->user_nim." - ".$data2->user_fullname."</option>";
							}
							?>
						</select>
					  </div>
					  <div class="form-group">
						<label>Pilih Pertemuan</label>
						<select type="text" class="form-control select2" name="nilai_pertemuan">
							<option>-- Pilih --</option>
							<?php
							for($x=1;$x<=12;$x++){
								echo "<option value='".$x."'>".$x."</option>";
							}
							?>
						</select>
					  </div>
					  <div class="form-group">
						<label>Nilai Angka</label>
						<input type="text" class="form-control" name="nilai_angka">
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