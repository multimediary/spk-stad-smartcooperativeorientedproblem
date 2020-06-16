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
				<div class="box-header">
					<h3 class="box-title">
						<a class="btn-sm btn-primary" href="<?php echo base_url("admin/nilai_tambah");?>"><i class="fa fa-plus"></i> <span>Tambah</span></a>
					</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
				  <table id="example1" class="table table-bordered table-striped">
					<thead>
					<tr>
					  <th>No</th>
					  <th>NIM</th>
					  <th>Nama Mahasiswa</th>
					  <th>Matakuliah</th>
					  <th>Pertemuan</th>
					  <th>Nilai</th>
					  <th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$no = 1;
					foreach($tbl_admin_nilai as $data){
						  echo "<tr>
						  <td>".$no."</td>
						  <td>".$data->user_nim."</td>
						  <td>".$data->user_fullname."</td>
						  <td>".$data->matakuliah_nama."</td>
						  <td>".$data->nilai_pertemuan."</td>
						  <td>".$data->nilai_angka."</td>
						  <td>
						  <a class='btn-sm btn-warning' href='".base_url("admin/nilai_ubah/".$data->nilai_id)."'>Ubah</a>
						  <a onclick=\"return confirm('Yakin untuk dihapus?')\" class='btn-sm btn-danger' href='".base_url("admin/nilai_aksi_hapus/".$data->nilai_id)."'>Hapus</a></td>
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