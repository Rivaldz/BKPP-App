<?= $this->extend('admin/layouts/layout_admin'); ?>
<?= $this->section('content'); ?>
    <!-- <button class="btn btn-info" data-toggle="modal" data-target="#tambahUser">Tambah User</button> -->
    <!-- <a class="btn btn-success" href="/User">Lihat User</a> -->

    <h1>Admin akan mereview data disini</h1>
    <div class="card mt-5">
		<div class="card-body">
			<table class="table table-responsive-lg">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama File</th>
						<th>Tanggal Upload</th>
						<th>Data Bidang</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$index =1; 
				foreach ($fileModel as $file):?>
					<tr>
                      <?php if($file['status'] == 1){ ?>
						<td><?= $index++; ?></td>
						<td><?= $file['nama_file'] ?></td>
						<td><?= $file['tanggal_upload'] ?></td>
						<td>Hukuman Disiplin</td>
						<td>
							<?php if($file['status'] == 1){ ?>
								<p class="text-info">Menunggu Persetujuan</p>
							<?php }elseif($file['status'] == 2){?>
								<button>Revisi</button>
							<?php }else{?>
								<p class="text-success">Di Terima</p>	
							<?php } ?>
						</td>
						<td> 
							<button>Download</button>
						</td>
                        <?php } ?>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>


    <h4>Daftar Bidang Dan Data Bidang </h4>
    <div>
        <table class="table table-bordered">
            <thead>
                <tr>
                <?php $no=1; foreach($getNamaBidang as $showdat){?>
                    <th><?=$showdat['nama_bidang'] ?></th>
                <?php $no++; } ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach($getBidangData as $sgbd){?>
                 <tr>
                    <?php foreach ($getNamaBidang as $vgnb) {?>
                    <td>
                        <?php if($sgbd['id_bidang'] == $vgnb['id_bidang']){ ?>
                            <?= $sgbd['nama_isi_bidang'] ?>
                        <?php } ?>
                    </td>
                    <?php } ?>
                 </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
<?= $this->endSection(); ?>