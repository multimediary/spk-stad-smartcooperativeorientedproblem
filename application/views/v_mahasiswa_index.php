  <div class="content-wrapper ">
    <section class="content-header">
      <h1>
        Profile
      </h1>
    </section>

    <!-- Main content -->

    <section class="content" >
      <div class="row">
	  
		<div class="col-xs-12">
			<div class="box">
				<div class="box-body no-padding">
					<table class="table table-striped">
					<tr><td width="25%">NIM</td><td width="3%"> : </td><td><?php echo $tbl_users->user_nim;?></td>
					<td width="250" rowspan="4"  style="text-align: center;">
						<img width="200" class="img" src="<?php echo base_url();?>assets/avatar/<?php echo $tbl_users->user_image."?".strtotime("now");?>">
					</td>
					<td width="5" rowspan="4" style="text-align: right;" >
						<a href="<?php echo base_url('mahasiswa/index_ubah');?>" class="btn btn-success" title="Ubah Profile"><i class="fa fa-pencil"></i></a>
					</td>
					</tr>
					<tr><td width="25%">Nama Lengkap</td><td width="3%"> : </td><td><?php echo $tbl_users->user_fullname;?></td></tr>
					<tr><td width="25%">Email</td><td width="3%"> : </td><td><?php echo $tbl_users->user_email;?></td></tr>
					<tr><td width="25%">Semester</td><td width="3%"> : </td><td><?php echo $tbl_users->user_semester;?></td></tr>
					</table>
				</div>
			</div>
			
			<div class="box">
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
					<thead>
					<tr>
					  <th width="40px">No</th>
					  <th>Nama Matakuliah</th>
					  <th width="70">Action</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$no = 1;
					foreach($tbl_admin_matakuliah as $data){
						  echo "<tr>
						  <td>".$no."</td>
						  <td>".$data->matakuliah_nama."</td>
						  <td>";
					?>
					<a href="<?php echo base_url('mahasiswa/group/').$data->matakuliah_id;?>" class="btn btn-info" title="Lihat Group"><i class="fa fa-eye"></i> Lihat Group</a>
					<?php
					echo "</td>
						  </tr>";
						  $no++;
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