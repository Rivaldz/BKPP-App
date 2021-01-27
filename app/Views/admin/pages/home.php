<?= $this->extend('admin/layouts/layout'); ?>

<?= $this->section('content'); ?>

	<h5>Silahkan download template excel <a href="">Disini!</a></h5>
	<form action="fileupload/upload" method="post">
		<div class="form-group">
			<input class="form-control-file border" type="file" name="file" id="file">
			<!-- <label for="file">Masukkan file excel</label> -->
		</div>
		<button type="submit" class="btn btn-success">Upload</button>
	</form>

	<table class="table mt-4">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama File</th>
				<th>Ukuran file</th>
				<th>Tanggal Upload</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>

		</tbody>
	</table>
	<!-- <p>Silahkan download template excel <a href="">Disni</a> </p>
	<form method="post" action="<?php echo base_url('FileUpload/upload');?>" enctype="multipart/form-data">
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