<?= $this->extend('admin/layouts/layout'); ?>

<?= $this->section('content'); ?>
	<a href="/login/logout">Logout</a>
	<?php 
		$idBidang = session()->get('id_bidang'); 
		foreach($getNamaBidang as $gnb){
			if( $idBidang==$gnb['id_bidang']){ ?>
				<h4>Selamat datang <?= session()->get('username'); ?> bidang <?= $gnb['nama_bidang']  ?> </h4>
	<?php }} ?>

	<h5>Silahkan download template excel <a href="https://drive.google.com/uc?export=download&id=1_cVgsnnSTjClOoRnOkGp25x3zUYwwADe">Disini!</a></h5>
	<div class="card">
		<div class="card-body">
			<form action="/home/upload/" method="post" enctype="multipart/form-data">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>
								Masukan File Laporan Yang Akan Di Upload
							</th>

							<th>
								Pilih Data Bidang
							</th>
						</tr>
					</thead>

					<tbody>
						<tr>
							<td>
								<input class="form-control-file border <?= ($validation->hasError('files'))?'is-invalid':''; ?>" type="file" name="files" id="files">
							</td>

							<td>

								<select name="idHome" id="ke" class="form-control">
								<?php foreach($getBidangData as $getBD){
									if ($getBD['id_bidang'] == session()->get('id_bidang')) {
								 ?>
									<option value="<?=$getBD['id_isi_bidang']?>"><?= $getBD["nama_isi_bidang"] ?></option>
								<?php 
								 }} ?>
								</select>	
							</td>
						</tr>
					</tbody>
				</table>
				<!-- <div class="form-group">
					<div class="invalid-feedback">
						<?= $validation->getError('files'); ?>
					</div>
<<<<<<< HEAD
				</div>
=======
					<label for="file">Masukkan file excel</label>
				</div> -->
>>>>>>> a1e97234576aed255c5890e16196723b664b31db
		</div>
		<div class="card-footer">
				<button type="submit" class="btn btn-success">Upload</button>
			</form>
		</div>
	</div>
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
				foreach ($dataFile as $file):
					if ($file['nama_bidang_id'] == session()->get('id_bidang')) {
						# code...
					?>
					<tr>
						<td><?= $index++; ?></td>
						<td><?= $file['nama_file'] ?></td>
						<td><?= $file['tanggal_upload'] ?></td>
						<td>
							<?php foreach($getBidangData as $gbdtd){
								if($gbdtd['id_isi_bidang'] == $file['data_bidang_id']){
							?>
								<?= $gbdtd['nama_isi_bidang'] ?>
							<?php }} ?>
						</td>
						<td>
							<?php if($file['status'] == 1){ ?>
								<p class="text-info">Sedang Di Review</p>
							<?php }elseif($file['status'] == 2){?>
								<button data-toggle="modal" data-target="#modalEditFile<?=$file['id']?>" >Revisi</button>
							<?php }else{?>
								<p class="text-success">Di Terima</p>	
							<?php } ?>
						</td>
						<td> 
								<a href="/Home/download/<?=$file['nama_file']?>">Download</a>
						</td>
					</tr>
					<div class="modal fade" id="modalEditFile<?= $file['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <form action="/Home/editFile/<?= $file['id']; ?>" method="post" enctype="multipart/form-data">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Bidang</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                                <?= csrf_field(); ?>
                                                <div class="form-group">
                                                    <label>Upload File Hasil Revisi</label>
													<input class="form-control-file border <?= ($validation->hasError('files'))?'is-invalid':''; ?>" type="file" name="editFiles" id="files">

                                                </div> 

											    <div class="form-group">
                                                    <label>Nama Data</label>
													<select name="nameRevisi" id="nameRevisi">
													<?php foreach($getBidangData as $gbdtd){
														if($gbdtd['id_isi_bidang'] == $file['data_bidang_id']){
													?>
													<option value="<?=$gbdtd['id_isi_bidang']?>" selected><?= $gbdtd['nama_isi_bidang'] ?></option>
													<?php }elseif(session()->get('id_bidang') == $gbdtd['id_bidang']){
													?>
														<option value="<?=$gbdtd['id_isi_bidang']?>"><?= $gbdtd['nama_isi_bidang'] ?></option>
													<?php }} ?>
													</select>

                                                </div> 
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
				<?php }endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

<?= $this->endSection(); ?>