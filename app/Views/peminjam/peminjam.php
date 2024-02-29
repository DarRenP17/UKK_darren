<?= view('layout/header')?>

<?= view('layout/nav')?>

<div class="row">

    <div class="col-lg-12">
        <div class="card">
        <div class="card-title">
            <p>Tabel Peminjam</p>
            </div>

        <div class="card-body">
        <a href="<?= base_url('/peminjam/input_pengawai')?>"> <button type="button" class="btn btn-success" >
										Tambah Peminjam
									</button> </a>
        <table id="bootstrap-data-table" class="table table-striped table-bordered">					<thead>
						<tr>
							<th style="text-align: center;" width="1000px">No.</th>
							<th style="text-align: center;" width="1000px">Nama Lengkap</th>
							<th style="text-align: center;" width="1000px">Email</th>
							<th style="text-align: center;" width="1000px">Alamat</th>
							<th style="text-align: center;" width="1000px">Username</th>
							<th style="text-align: center;" width="1300px">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
                    $no=1;
                    foreach ($data as $dataa){?>
						<tr>
							<td style="text-align: center;" class="text-capitalize"><?php echo $no++ ?></td>
							<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->namaLengkap ?></td>
							<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->email ?></td>
							<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->alamat ?></td>
							<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->username ?></td>
							<td>
							<div class="text-center mb-1">
                               <a href="<?= base_url('/peminjam/reset_password/'.$dataa->id_user)?>"> <button type="button" class="btn btn-info" >
										Reset Password
									</button> </a>
									<a href="<?= base_url('/peminjam/edit/'.$dataa->id_user) ?>" class="btn btn-warning">
										Edit
									</a>
									<a href="<?= base_url('/peminjam/hapus/'.$dataa->id_user)?>"><button type="button" class="btn btn-danger" >
										Delete
									</button> </a>
							</div>
                            </td>

                           
							
						</tr>
                    <?php }?>
					</tbody>
				</table>
          
            </div>
        </div>

    </div>

   







</div>


<?= view('layout/footer')?>

