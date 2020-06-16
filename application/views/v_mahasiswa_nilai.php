  <div class="content-wrapper ">
    <section class="content-header">
      <h1>
        Input Nilai
      </h1>
    </section>

    <!-- Main content -->
    <section class="content" >
      <div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-body no-padding">
				<?php echo form_open("mahasiswa/nilai_aksi_tambah"); ?>
				
					<table class="table table-striped">
					<tr><td width="30%">Pilih Mata Kuliah</td><td width="3%"> : </td>
						<td>
						<div class="form-group">
						<select type="text" class="form-control select" onchange="if (this.value) window.location='<?php echo base_url();?>mahasiswa/nilai/'+this.value">
						<?php
						$matakuliah_id = $this->uri->segment(3);
						if($matakuliah_id<1){?>
							<option>-- Pilih --</option>
						<?php }else{ 
							$query_mat = $this->db->query("select * from tbl_admin_matakuliah where matakuliah_id = '$matakuliah_id'");
							foreach ($query_mat->result_array() as $row_mat);
							
									$nilaimatakuliah1 = $row_mat['matakuliah_nilai_x'];
									$nilaimatakuliah2 = $row_mat['matakuliah_nilai_y'];
							
							echo "<option value=\"$row_mat[matakuliah_id]\">"; $matakuliah_nama = $row_mat['matakuliah_nama']; echo "$matakuliah_nama</option>";
						} ?>
							<?php
							$user_id = $this->session->userdata('userid');
							$query = $this->db->query("select * from tbl_admin_matakuliah,tbl_admin_matakuliah_users,tbl_users where 
tbl_admin_matakuliah.matakuliah_id=tbl_admin_matakuliah_users.matakuliah_id and
tbl_users.user_id=tbl_admin_matakuliah_users.user_id and tbl_admin_matakuliah_users.user_id='$user_id'");
							foreach ($query->result() as $row)
							{
								echo "<option value='".$row->matakuliah_id."'>".$row->matakuliah_nama."</option>";
							}
							?>
						</select>
					  </div>
					  <input type="hidden" name="matakuliah_id" value="<?php echo $matakuliah_id;?>">
						</td>
					</tr>
					<?php
					if($matakuliah_id>0){ ?>
					<tr><td width="30%"><?php echo $nilaimatakuliah1;?></td><td width="3%"> : </td><td><input type="number" step="0.01" class="form-control" name="m_nilai_algo" placeholder="Contoh : 3.84"></td></tr>
					
					<tr><td width="30%"><?php echo $nilaimatakuliah2;?></td><td width="3%"> : </td><td><input type="number" step="0.01" class="form-control" name="m_nilai_ipk" placeholder="Contoh : 3.84"></td></tr>
					<?php } ?>
					<tr><td width="30%"></td><td width="3%"></td>
						<td>
							<div class="form-group">
								<input type="submit" name="submit" value="Submit" class="btn btn-success">
							</div>
						</td>
					</tr>
					</table>
				<?php echo form_close(); ?>
				</div>
			</div>
			<div class="box">
				<div class="box-body">
					<table class="table table-bordered table-striped">
					<thead>
					</thead>
					<tbody>
					<?php
					foreach($tbl_mahasiswa_nilai as $data){
					$matakuliahid = $data->matakuliah_id;
					$query_kls = $this->db->query("select * from tbl_admin_matakuliah where matakuliah_id = '$matakuliahid'");
					foreach ($query_kls->result_array() as $row_kls);
					echo "
					<tr>
					  <th width='40%' style='text-align:center;'>Nama Mata Kuliah</th>
					  <th width='30%' style='text-align:center;'>$row_kls[matakuliah_nilai_x]</th>
					  <th width='40%' style='text-align:center;'>$row_kls[matakuliah_nilai_y]</th>
					</tr><tr>
						  <td style='text-align:center;'>";
					echo $row_kls['matakuliah_nama'];  
					echo	  "</td><td style='text-align:center;'>".$data->m_nilai_algo."</td>
						  <td style='text-align:center;'>".$data->m_nilai_ipk."</td>
						  </tr>";
					}
					?>
					</tbody>
				  </table>
				</div>
			</div>
		</div>
      </div>
    </section>
	
  </div>