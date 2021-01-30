<?= $this->extend('admin/layouts/layout'); ?>

<?= $this->section('content'); ?>
	<h4>Selamat datang admin bidang Binaindo </h4>
	<h5>Silahkan download template excel <a href="https://drive.google.com/uc?export=download&id=1_cVgsnnSTjClOoRnOkGp25x3zUYwwADe">Disini!</a></h5>
	<div class="card">
		<div class="card-body">
			<form action="/home/upload" method="post" enctype="multipart/form-data">
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
								<select name="ke" id="ke" class="form-control">
									<option value="1"> Hukuman Disiplin</option>
									<option value="2"> Pemberhentian</option>
									<option value="3"> Perceraian</option>
								</select>	
							</td>
						</tr>
					</tbody>

				</table>
				<!-- <div class="form-group">
					<div class="invalid-feedback">
						<?= $validation->getError('files'); ?>
					</div>
					<label for="file">Masukkan file excel</label>
				</div> -->
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
					</tr>
				</thead>
				<tbody>
				<?php
				$index =1; 
				foreach ($dataFile as $file):?>
					<tr>
						<td><?= $index++; ?></td>
						<td><?= $file['name']; ?></td>
						<td>29-01-20021</td>
						<td>Hukuman Disiplin</td>
						<td>Di Review</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

	<!-- <p>Silahkan download template excel <a href="https://drive.google.com/uc?export=download&id=1_cVgsnnSTjClOoRnOkGp25x3zUYwwADe">Disni</a> </p>
		</tbody>
	</table>
	<p>Silahkan download template excel <a href="">Disni</a> </p>
	<form method="post" action="" enctype="multipart/form-data">
      <div class="form-group">
        <label>Upload File</label>
        <br>
        <input class="custom-file-inoput" type="file" name="file" class="">
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-danger">Upload</button>
      </div>
    </form> -->

<!-- <div class="table-responsive">
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama File</th>
			<th>Ukuran File</th>
			<th>Tanggal Upload</th>
			<th>Download</th>
		</tr>
	</thead>
	<tbody>
	<tr>
            <td>1</td>
            <td>BKPP.xlsx</td> 
            <td>1 MB</td>
            <td>25 januari 2021</td>
            <td>
				<button class="btn btn-info">Download</button>
			</td>
        </tr>
	</tbody>
    </table>
<?php
$no=null;
$dir = "uploaded_file/";

if(isset($daftar_file)){
	for($a=0;$a<count($daftar_file);$a++) { 
		if($daftar_file[$a]!='.' && $daftar_file[$a]!='..'){
		$no++;
		$file=$daftar_file[$a];
		?>
	<tr>
		<td align="center"><?php echo $no;?></td>
		<td><?php echo $file;?></td>
		<td align="right"><?php echo number_format(filesize($dir.$daftar_file[$a])/1024,2,',','.');?> Kb</td>
		<td><?php echo date ("d-M-Y H:i:s", filemtime($dir.$daftar_file[$a]));?></td>
		<td align="center">
			<a href="<?php echo $dir.$daftar_file[$a];?>"><span class="glyphicon glyphicon-cloud-download"></span></a>
			<a href="<?php echo base_url().'upload/hapus/'.$daftar_file[$a];?>"><span class="glyphicon glyphicon-trash"></span></a>
			</td>
	</tr>
	</tbody>
	<?php
		 }
		}	
	}
	?>
</table>
</div>


</html>	
</form> -->
<?= $this->endSection(); ?>